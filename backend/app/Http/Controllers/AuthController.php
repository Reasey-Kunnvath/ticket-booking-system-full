<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private function generate_token($user)
    {
        return $user->createToken('auth_token')->plainTextToken;
    }

    private function role_check($user, $role_id)
    {
        return $user->role_id == $role_id;
    }

    private function login_handler($request, $role_id)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $valid_role = $this->role_check($user, $role_id);

        if (!$valid_role) {
            return response()->json([
                'message' => 'khos role hz dawg'
            ], 403);
        }

        return response()->json([
            'message' => 'Success',
            'access_token' => $this->generate_token($user),
            'user' => $user
        ]);
    }

    public function user_login(Request $request)
    {
        return $this->login_handler($request, config('roles.user'));
    }

    public function admin_login(Request $request)
    {
        return $this->login_handler($request, config('roles.admin'));
    }

    public function event_provider_login(Request $request)
    {
        return $this->login_handler($request, config('roles.event-provider'));
    }

    public function user_register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

        $hash_password = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash_password,
            'role_id' => config('roles.user'),
        ]);

        $access_token = $this->generate_token($user);

        return response()->json([
            'message' => 'User registered successfully',
            'access_token' => $access_token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'logout hz hz'
        ]);
    }
}