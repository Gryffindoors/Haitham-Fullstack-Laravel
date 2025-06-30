<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\TableLocation;
use App\Models\TableLocationAssignment;
use App\Models\TableStatus;

class TablesController extends Controller
{
    // GET /api/tables
    public function index()
    {
        return Table::all();
    }

    // GET /api/tables/locations
    public function getLocations()
    {
        return TableLocation::with('status')->get();
    }

    // GET /api/tables/map
    public function getFullMap()
    {
        $tables = Table::with(['location.status'])->get();

        return $tables->map(function ($table) {
            return [
                'table_number' => $table->table_number ?? $table->code ?? $table->id,
                'location_code' => $table->location?->location_code ?? 'Unassigned',
                'status' => $table->location?->status?->status ?? 'Unknown',
            ];
        });
    }

    // POST /api/tables/assign
    public function updateTableMapping(Request $request)
    {
        $validated = $request->validate([
            'table_number' => 'nullable|string|exists:tables,table_number',
            'location_code' => 'nullable|string|exists:table_locations,location_code',
            'status' => 'nullable|string|in:empty,reserved,occupied,out_of_order,needs_clearing',
        ]);

        // Assign location to table if both are provided
        if (!empty($validated['table_number']) && !empty($validated['location_code'])) {
            $table = Table::where('table_number', $validated['table_number'])->first();
            $location = TableLocation::where('location_code', $validated['location_code'])->first();

            if ($table && $location) {
                TableLocationAssignment::updateOrCreate(
                    ['table_id' => $table->id],
                    ['table_location_id' => $location->id]
                );
            }
        }

        // Update status on a location if both status and location_code provided
        if (!empty($validated['status']) && !empty($validated['location_code'])) {
            $location = TableLocation::where('location_code', $validated['location_code'])->first();

            if ($location) {
                $statusId = TableStatus::where('status', $validated['status'])->value('id');

                if (!$statusId) {
                    return response()->json(['error' => 'Invalid status value'], 422);
                }

                $location->status_id = $statusId;
                $location->save();
            }
        }

        return response()->json(['message' => 'Update successful.']);
    }
}
