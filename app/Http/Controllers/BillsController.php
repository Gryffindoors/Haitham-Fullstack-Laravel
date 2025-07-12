<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillOrder;
use App\Models\BillPayment;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BillsController extends Controller
{
    protected function userRole()
    {
        return auth()->user()->load('role')->role->role ?? '';
    }

    protected function denyIfNotRole(array $allowed)
    {
        $role = $this->userRole();
        if (!in_array($role, $allowed)) {
            abort(403, 'Unauthorized');
        }
        return $role;
    }

    public function index()
    {
        $role = $this->denyIfNotRole(['owner', 'supervisor', 'cashier']);

        if ($role === 'cashier') {
            return $this->today();
        }

        $bills = Bill::with(['orders', 'orderItems', 'billPayments', 'customer'])
            ->orderByDesc('created_at')
            ->get();

        $formatted = $bills->map(fn($bill) => $this->formatBillWithStatus($bill));
        return response()->json($formatted);
    }

    public function today()
    {
        $this->denyIfNotRole(['owner', 'supervisor', 'cashier']);

        $today = Carbon::today();

        $bills = Bill::with(['orders', 'orderItems', 'billPayments', 'customer'])
            ->whereDate('created_at', $today)
            ->orderByDesc('created_at')
            ->get();

        $formatted = $bills->map(fn($bill) => $this->formatBillWithStatus($bill));
        return response()->json($formatted);
    }

    public function show($id)
    {
        $this->denyIfNotRole(['owner', 'supervisor', 'cashier']);

        $bill = Bill::with(['orders', 'orderItems.menuItem', 'billPayments.paymentMethod', 'customer'])
            ->findOrFail($id);

        return response()->json($this->formatBillWithStatus($bill));
    }

    public function createEmpty(Request $request)
    {
        $this->denyIfNotRole(['owner', 'supervisor', 'cashier']);

        $validated = $request->validate([
            'order_ids' => 'required|array|min:1',
            'order_ids.*' => 'exists:orders,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'tax' => 'nullable|numeric|min:0',
            'service_charge' => 'nullable|numeric|min:0',
            'tips' => 'nullable|numeric|min:0',
            'total_cost' => 'required|numeric|min:0',
        ]);

        try {
            $firstOrder = Order::find($validated['order_ids'][0]);
            $customerId = $firstOrder?->customer_id;

            $bill = Bill::create([
                'customer_id' => $customerId,
                'payment_method_id' => $validated['payment_method_id'],
                'total_cost' => $validated['total_cost'],
                'tax' => $validated['tax'] ?? 0,
                'service_charge' => $validated['service_charge'] ?? 0,
                'tips' => $validated['tips'] ?? 0,
                'created_by' => Auth::id(),
            ]);

            foreach ($validated['order_ids'] as $orderId) {
                BillOrder::create([
                    'bill_id' => $bill->id,
                    'order_id' => $orderId,
                ]);
            }

            return response()->json([
                'message' => 'Empty bill created.',
                'bill_id' => $bill->id,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Failed to create empty bill.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function attachItems(Request $request, $id)
    {
        $this->denyIfNotRole(['owner', 'supervisor', 'cashier']);

        $validated = $request->validate([
            'order_ids' => 'required|array|min:1',
            'order_ids.*' => 'exists:orders,id',
            'item_ids' => 'nullable|array',
            'item_ids.*' => 'exists:order_items,id',

            // Optional payment
            'amount' => 'nullable|numeric|min:0.01',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'transaction_number' => 'nullable|string',
            'tax' => 'nullable|numeric|min:0',
            'service_charge' => 'nullable|numeric|min:0',
            'tips' => 'nullable|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $query = OrderItem::whereNull('bill_id');

            if (!empty($validated['item_ids'])) {
                $query->whereIn('id', $validated['item_ids']);
            } else {
                $query->whereIn('order_id', $validated['order_ids']);
            }

            $items = $query->get();

            if ($items->isEmpty()) {
                throw new \Exception('No unbilled items found.');
            }

            OrderItem::whereIn('id', $items->pluck('id'))->update(['bill_id' => $id]);

            $bill = Bill::findOrFail($id);

            // Optional: Apply updated totals
            $bill->tax = $validated['tax'] ?? $bill->tax;
            $bill->service_charge = $validated['service_charge'] ?? $bill->service_charge;
            $bill->tips = $validated['tips'] ?? $bill->tips;
            $bill->save();

            // Optional: Create payment
            if (!empty($validated['amount']) && !empty($validated['payment_method_id'])) {
                $payment = new BillPayment([
                    'payment_method_id' => $validated['payment_method_id'],
                    'amount' => $validated['amount'],
                    'transaction_number' => $validated['transaction_number'] ?? null,
                    'paid_at' => now(),
                    'created_by' => Auth::id(),
                ]);
                $bill->billPayments()->save($payment);
            }

            DB::commit();

            return response()->json([
                'message' => 'Items attached' . (!empty($validated['amount']) ? ' and payment recorded.' : '.'),
                'attached_item_ids' => $items->pluck('id'),
                'remaining' => $bill->remaining_amount ?? null,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to attach items.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function pay(Request $request, $id)
    {
        $this->denyIfNotRole(['owner', 'supervisor', 'cashier']);

        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'transaction_number' => 'nullable|string',
            'tax' => 'nullable|numeric|min:0',
            'service_charge' => 'nullable|numeric|min:0',
            'tips' => 'nullable|numeric|min:0',
        ]);

        $bill = Bill::findOrFail($id);

        DB::beginTransaction();
        try {
            $bill->tax = $validated['tax'] ?? $bill->tax;
            $bill->service_charge = $validated['service_charge'] ?? $bill->service_charge;
            $bill->tips = $validated['tips'] ?? $bill->tips;
            $bill->save();

            $payment = new BillPayment([
                'payment_method_id' => $validated['payment_method_id'],
                'amount' => $validated['amount'],
                'transaction_number' => $validated['transaction_number'] ?? null,
                'paid_at' => now(),
                'created_by' => Auth::id(),
            ]);
            $bill->billPayments()->save($payment);

            DB::commit();

            return response()->json([
                'message' => 'Payment recorded.',
                'remaining' => $bill->remaining_amount ?? null,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to process payment.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user()->load('role');
        $role = $user->role->role ?? null;

        $request->validate([
            'tax' => 'nullable|numeric|min:0',
            'service_charge' => 'nullable|numeric|min:0',
            'tips' => 'nullable|numeric|min:0',
        ]);

        $bill = Bill::findOrFail($id);

        if ($role === 'cashier' && !$bill->created_at->isToday()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if (!in_array($role, ['owner', 'supervisor', 'cashier'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $bill->tax = $request->input('tax', $bill->tax);
        $bill->service_charge = $request->input('service_charge', $bill->service_charge);
        $bill->tips = $request->input('tips', $bill->tips);
        $bill->save();

        return response()->json([
            'message' => 'Bill updated.',
            'bill' => $bill->fresh()
        ]);
    }

    public function print($id)
    {
        // Implementation placeholder
    }

    private function formatBillWithStatus($bill)
    {
        $paidAmount = $bill->billPayments->sum('amount');
        $status = $paidAmount >= $bill->total_cost ? 'paid' : 'unpaid';

        return [
            'id' => $bill->id,
            'total_cost' => $bill->total_cost,
            'paid_amount' => $paidAmount,
            'status' => $status,
            'tax' => $bill->tax,
            'service_charge' => $bill->service_charge,
            'tips' => $bill->tips,
            'customer' => $bill->customer ?? null,
            'orders' => $bill->orders ?? [],
            'order_items' => $bill->orderItems ?? [],
            'bill_payments' => $bill->billPayments ?? [],
            'created_at' => $bill->created_at,
        ];
    }
}
