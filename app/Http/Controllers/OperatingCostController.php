<?php

namespace App\Http\Controllers;

use App\Models\OperatingCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatingCostController extends Controller
{
    public function index(Request $request)
    {
        $query = OperatingCost::query();

        if ($request->has(['month', 'year'])) {
            $query->whereMonth('cost_month', $request->month)
                ->whereYear('cost_month', $request->year);
        }

        return $query->orderByDesc('cost_month')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'amount' => 'required|numeric',
            'cost_month' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $cost = OperatingCost::create([
            'category' => $request->category,
            'amount' => $request->amount,
            'cost_month' => $request->cost_month,
            'note' => $request->note,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return response()->json($cost, 201);
    }

    public function update(Request $request, $id)
    {
        $cost = OperatingCost::findOrFail($id);

        $request->validate([
            'category' => 'required|string',
            'amount' => 'required|numeric',
            'cost_month' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $cost->update([
            'category' => $request->category,
            'amount' => $request->amount,
            'cost_month' => $request->cost_month,
            'note' => $request->note,
            'updated_by' => Auth::id(),
        ]);

        return response()->json($cost);
    }

    public function destroy($id)
    {
        $cost = OperatingCost::findOrFail($id);
        $cost->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
