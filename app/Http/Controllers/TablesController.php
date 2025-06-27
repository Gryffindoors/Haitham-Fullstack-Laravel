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
        return Table::with(['location.status'])->get();
    }

    // POST /api/tables/assign
    public function assignLocation(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'table_location_id' => 'required|exists:table_locations,id',
        ]);

        TableLocationAssignment::updateOrCreate(
            ['table_id' => $request->table_id],
            ['table_location_id' => $request->table_location_id]
        );

        return response()->json(['message' => 'Table location assigned successfully.']);
    }

    // PUT /api/tables/location/{id}/status
    public function updateLocationStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:empty,reserved,occupied,out_of_order,needs_clearing'
        ]);

        $statusId = TableStatus::where('status', $request->status)->value('id');

        if (!$statusId) {
            return response()->json(['error' => 'Invalid status value'], 422);
        }

        $location = TableLocation::findOrFail($id);
        $location->status_id = $statusId;
        $location->save();

        return response()->json(['message' => 'Location status updated.', 'location' => $location]);
    }
}
