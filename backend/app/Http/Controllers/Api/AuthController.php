<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->unauthorizedResponse("Invalid credentials");
        }

        $valid_role = $this->role_check($user, $role_id);

        if (!$valid_role) {
            return $this->forbiddenResponse("invalid role");
        }

        return $this->successResponse([
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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:5',

        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }

        $hash_password = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash_password,
            'role_id' => config('roles.user'),
        ]);

        $access_token = $this->generate_token($user);

        return $this->successResponse([
            'access_token' => $access_token
        ], 'User registered successfully');
    }

    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'logout hz hz',
            'data' => $request->all()
        ]);
        $request->user()->tokens()->delete();

<<<<<<< HEAD:backend/app/Http/Controllers/AuthController.php
        // return response()->json([
        //     'message' => 'logout hz hz'
        // ]);
=======
        return $this->successResponse(null, 'logged out');
    }

    public function profile(Request $request)
    {
        return $this->successResponse([
            'user' => $request->user()
        ]);
>>>>>>> 62f57f8e3702e81e5f4e21b7e0547c7712312638:backend/app/Http/Controllers/Api/AuthController.php
    }
}
