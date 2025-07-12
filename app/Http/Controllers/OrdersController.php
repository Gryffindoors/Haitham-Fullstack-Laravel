<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $query = Order::with([
            'status:id,status,status_ar',
            'type:id,type,type_ar',
            'customer:id,first_name,last_name'
        ]);

        // If not owner/supervisor, filter to today only
        if (!in_array($user->role, ['owner', 'supervisor'])) {
            $query->whereDate('ordered_at', Carbon::today());
        }

        $orders = $query->orderByDesc('ordered_at')->get();

        // Map result to match the /orders/{id} response format
        return response()->json($orders->map(function ($order) {
            return [
                'id' => $order->id,
                'customer' => $order->customer
                    ? [
                        'id' => $order->customer->id,
                        'first_name' => $order->customer->first_name,
                        'last_name' => $order->customer->last_name,
                    ]
                    : null,
                'order_type' => $order->type,
                'table_id' => $order->table_id,
                'status' => $order->status,
                'ordered_at' => $order->ordered_at,
                'completed_at' => $order->completed_at,
                'total' => $order->total,
            ];
        }));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. If 'order_type' name is sent, resolve it to 'order_type_id'
        if ($request->has('order_type') && !$request->has('order_type_id')) {
            $orderType = \App\Models\OrderType::where('type', $request->input('order_type'))->first();

            if (!$orderType) {
                return response()->json(['error' => 'Invalid order type'], 422);
            }

            $request->merge(['order_type_id' => $orderType->id]);
        }

        // 2. Proceed with normal validation and processing
        $data = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'order_type_id' => 'required|exists:order_types,id',
            'table_id' => 'nullable|integer',
            'status_id' => 'required|exists:order_statuses,id',
            'ordered_at' => 'nullable|date',
            'items' => 'required|array|min:1',
            'items.*.menu_item_id' => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);
        $order = Order::create([
            'customer_id' => $data['customer_id'] ?? null,
            'order_type_id' => $data['order_type_id'],
            'table_id' => $data['table_id'],
            'status_id' => $data['status_id'],
            'ordered_at' => $data['ordered_at'] ?? now(),
            'created_by' => auth()->id(),
            'total' => 0,
        ]);

        $total = 0;

        foreach ($data['items'] as $item) {
            $menuItem = \App\Models\MenuItem::find($item['menu_item_id']);
            $unitPrice = $menuItem->price;
            $lineTotal = $unitPrice * $item['quantity'];
            $total += $lineTotal;

            $order->orderItems()->create([
                'menu_item_id' => $item['menu_item_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $unitPrice,
                'total_price' => $lineTotal,
            ]);
        }

        $order->update(['total' => $total]);

        return $this->show($order->id);
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::with([
            'status:id,status,status_ar',
            'type:id,type,type_ar',
            'customer:id,first_name,last_name',
            'orderItems.menuItem:id,name,name_ar'
        ])->findOrFail($id);

        $firstBillId = $order->orderItems->firstWhere('bill_id', '!=', null)?->bill_id;

        return response()->json([
            'id' => $order->id,
            'customer' => [
                'id' => $order->customer->id ?? null,
                'first_name' => $order->customer->first_name ?? '',
                'last_name' => $order->customer->last_name ?? '',
            ],
            'order_type' => $order->type,
            'table_id' => $order->table_id,
            'status' => $order->status,
            'special_offer_id' => $order->special_offer_id,
            'ordered_at' => $order->ordered_at,
            'completed_at' => $order->completed_at,
            'created_by' => $order->created_by,
            'updated_by' => $order->updated_by,
            'total' => $order->total,
            'bill_id' => $firstBillId, // ✅ New top-level field
            'items' => $order->orderItems->map(function ($item) {
                return [
                    'id' => $item->id,
                    'menu_item_id' => $item->menu_item_id,
                    'name' => $item->menuItem->name ?? null,
                    'name_ar' => $item->menuItem->name_ar ?? null,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                    'total_price' => $item->total_price,
                    'bill_id' => $item->bill_id, // ✅ bill_id per item
                ];
            })
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $data = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'order_type_id' => 'required|exists:order_types,id',
            'table_id' => 'nullable|integer',
            'status_id' => 'required|exists:order_statuses,id',
            'ordered_at' => 'nullable|date',
            'items' => 'required|array|min:1',
            'items.*.menu_item_id' => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order->update([
            'customer_id' => $data['customer_id'] ?? null,
            'order_type_id' => $data['order_type_id'],
            'table_id' => $data['table_id'],
            'status_id' => $data['status_id'],
            'ordered_at' => $data['ordered_at'] ?? now(),
            'updated_by' => auth()->id(),
        ]);
 
        $order->orderItems()->delete(); // reset items

        $total = 0;
        foreach ($data['items'] as $item) {
            $menuItem = \App\Models\MenuItem::find($item['menu_item_id']);
            $unitPrice = $menuItem->price;
            $lineTotal = $unitPrice * $item['quantity'];
            $total += $lineTotal;

            $order->orderItems()->create([
                'menu_item_id' => $item['menu_item_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $unitPrice,
                'total_price' => $lineTotal,
            ]);
        }

        $order->update(['total' => $total]);

        return $this->show($order->id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $orders)
    {
        $orders->orderItems()->forceDelete(); // soft-delete items
        $orders->delete(); // soft-delete order

        return response()->json(['message' => 'Order deleted']);
    }
}
