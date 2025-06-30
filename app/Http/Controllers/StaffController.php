<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Department;
use App\Models\StaffPhone;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class StaffController extends Controller
{

    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        if (!in_array($user->role->role ?? '', ['owner', 'supervisor'])) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        /** @var \App\Models\Staff $staff */
        $staffList = Staff::with(['department', 'phones', 'user.role']) // ✅ add role
            ->get()
            ->map(function ($staff) {
                return [
                    'id' => $staff->id,
                    'first_name' => $staff->first_name,
                    'last_name' => $staff->last_name,
                    'first_name_ar' => $staff->first_name_ar,
                    'last_name_ar' => $staff->last_name_ar,
                    'address' => $staff->address,
                    'image_url' => $staff->image_url,
                    'department' => $staff->department,
                    'phones' => $staff->phones->pluck('phone_number'),
                    'username' => optional($staff->user)->username,
                    'user_role' => optional($staff->user?->role)->role, // ✅ added here
                    'is_manager' => $staff->department?->manager_id === $staff->id,
                ];
            });

        return response()->json($staffList);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'first_name_ar' => 'required|string|max:255',
            'last_name_ar' => 'required|string|max:255',
            'department_id' => 'required|integer|exists:departments,id',
            'timetable_id' => 'nullable|integer|exists:timetables,id',
            'employment_date' => 'required|date',
            'image' => 'nullable|image|mimes:webp,jpg,jpeg,png|max:2048',
            'phones' => 'array',
            'phones.*' => 'string',
            'username' => 'nullable|string|unique:users,username',
            'password' => 'nullable|string|min:6',
            'role_id' => 'nullable|exists:user_roles,id',
            'is_manager' => 'nullable|boolean'
        ]);

        DB::beginTransaction();
        try {
            $data = $request->except(['image', 'phones', 'username', 'password', 'role_id', 'is_manager']);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images/staff', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            $staff = Staff::create($data);

            if ($request->filled('phones')) {
                foreach ($request->phones as $phone) {
                    StaffPhone::create(['staff_id' => $staff->id, 'phone_number' => $phone]);
                }
            }

            if ($request->filled('username') && $request->filled('password')) {
                User::create([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'staff_id' => $staff->id,
                    'role_id' => $request->input('role_id', 5),
                    'created_by' => auth()->user()?->id,
                    'updated_by' => auth()->user()?->id,
                ]);
            }

            if ($request->boolean('is_manager')) {
                Department::where('id', $staff->department_id)->update(['manager_id' => $staff->id]);
            }

            DB::commit();
            return response()->json(['message' => 'Staff created successfully', 'data' => $staff]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to store staff', 'details' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'first_name_ar' => 'sometimes|string|max:255',
            'last_name_ar' => 'sometimes|string|max:255',
            'department_id' => 'sometimes|integer|exists:departments,id',
            'timetable_id' => 'nullable|integer|exists:timetables,id',
            'employment_date' => 'sometimes|date',
            'termination_date' => 'nullable|date',
            'note' => 'nullable|string',
            'image' => 'nullable|image|mimes:webp,jpg,jpeg,png|max:2048',
            'phones' => 'array',
            'phones.*' => 'string',
            'username' => 'nullable|string|unique:users,username,' . ($staff->user?->id ?? 'null'),
            'password' => 'nullable|string|min:6',
            'role_id' => 'nullable|exists:user_roles,id',
            'is_manager' => 'nullable|boolean'
        ]);

        DB::beginTransaction();
        try {
            $data = $request->except(['image', 'phones', 'username', 'password', 'role_id', 'is_manager']);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images/staff', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            $staff->update($data);

            if ($request->filled('phones')) {
                $staff->phones()->delete();
                foreach ($request->phones as $phone) {
                    StaffPhone::create(['staff_id' => $staff->id, 'phone_number' => $phone]);
                }
            }

            if ($staff->user) {
                $staff->user->update([
                    'username' => $request->input('username', $staff->user->username),
                    'password' => $request->filled('password') ? Hash::make($request->password) : $staff->user->password,
                    'role_id' => $request->input('role_id', $staff->user->role_id),
                    'updated_by' => auth()->user()?->id,
                ]);
            }

            if ($request->boolean('is_manager')) {
                Department::where('id', $staff->department_id)->update(['manager_id' => $staff->id]);
            }

            DB::commit();
            return response()->json(['message' => 'Staff updated successfully', 'data' => $staff]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update staff', 'details' => $e->getMessage()], 500);
        }
    }

    public function destroy(Staff $staff)
    {
        $staff->phones()->delete();
        if ($staff->user) $staff->user->delete();
        $staff->delete();

        return response()->json(['message' => 'Staff member deleted successfully']);
    }

    public function roleList()
    {
        return response()->json(UserRole::all());
    }

    public function staffList()
    {
        return response()->json(Staff::select('id', 'first_name', 'last_name')->get());
    }

    public function departmentList()
    {
        return response()->json(
            Department::select('id', 'name', 'name_ar')->get()
        );
    }
}
