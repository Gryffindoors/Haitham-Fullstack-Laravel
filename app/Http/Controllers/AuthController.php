<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
    // 🔐 Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    // 🚪 Logout
    public function logout(Request $request)
    {
        /** @var PersonalAccessToken|null $token */
        $token = $request->user()?->currentAccessToken();

        if ($token) {
            $token->delete();
        }

        return response()->json(['message' => 'Logged out']);
    }

    // 🙋‍♂️ Get current user info
    public function me(Request $request)
    {
        $user = $request->user()->load('role', 'staff.timetable');

        return response()->json([
            'id' => $user->id,
            'username' => $user->username,
            'role' => $user->role->role ?? null,

            // Staff flattened fields
            'first_name' => $user->staff?->first_name,
            'last_name' => $user->staff?->last_name,
            'first_name_ar' => $user->staff?->first_name_ar,
            'last_name_ar' => $user->staff?->last_name_ar,
            'image' => $user->staff?->image_url,
            'timetable' => $user->staff?->timetable?->name,
            'timetable_ar' => $user->staff?->timetable?->name_ar,
        ]);
    }
}
