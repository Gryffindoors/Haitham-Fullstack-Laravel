<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    // 🔎 List users, with optional staff name filter
    public function index(Request $request)
    {
        $query = User::with(['role:id,name', 'staff:id,name']);

        if ($search = $request->input('staff_name')) {
            $query->whereHas('staff', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        return $query->get();
    }

    // 📥 Create new user
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
            'role_id' => ['required', Rule::exists('user_roles', 'id')],
            'staff_id' => ['required', Rule::exists('staff', 'id')],
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'staff_id' => $request->staff_id,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return response()->json($user, 201);
    }

    // ✏️ Update existing user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => ['sometimes', 'string', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:6',
            'role_id' => ['sometimes', Rule::exists('user_roles', 'id')],
            'staff_id' => ['sometimes', Rule::exists('staff', 'id')],
        ]);

        if ($request->filled('username')) {
            $user->username = $request->username;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->filled('role_id')) {
            $user->role_id = $request->role_id;
        }
        if ($request->filled('staff_id')) {
            $user->staff_id = $request->staff_id;
        }

        $user->updated_by = Auth::id();
        $user->save();

        return response()->json($user);
    }

    // ❌ Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }

    // 🧾 Get all staff names (for dropdowns)
    public function staffList()
    {
        return Staff::select('id', 'name')->orderBy('name')->get();
    }

    // 🧾 Get all roles (for dropdowns)
    public function roleList()
    {
        return UserRole::select('id', 'name')->orderBy('name')->get();
    }
}
