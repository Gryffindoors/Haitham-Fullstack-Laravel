<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'department_id' => 'required|integer|exists:departments,id',
            'timetable_id' => 'nullable|integer|exists:timetables,id',
            'employment_date' => 'required|date',
            'image' => 'nullable|image|mimes:webp,jpg,jpeg,png|max:2048',
            // Add other fields as needed
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/staff', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $staff = Staff::create($data);

        return response()->json(['message' => 'Staff created successfully', 'data' => $staff]);
    }

    /**
     * Display the specified resource.
     */
    public function show(staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'department_id' => 'sometimes|integer|exists:departments,id',
            'timetable_id' => 'nullable|integer|exists:timetables,id',
            'employment_date' => 'sometimes|date',
            'termination_date' => 'nullable|date',
            'note' => 'nullable|string',
            'image' => 'nullable|image|mimes:webp,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/staff', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $staff->update($data);

        return response()->json(['message' => 'Staff updated successfully', 'data' => $staff]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return response()->json(['message' => 'Staff member deleted successfully']);
    }
}
