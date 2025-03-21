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


    /**
     * User Login
     **/
    public function user_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }
        return $this->login_handler($request, config('roles.user'));
    }

    /**
     * Admin Login
     **/
    public function admin_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }

        return $this->login_handler($request, config('roles.admin'));
    }

    /**
     * Event Provider Login
     **/
    public function event_provider_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }
        return $this->login_handler($request, config('roles.event-provider'));
    }


    /**
     * User Register
     **/
    public function user_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:255',
            'password' => 'required|string|min:8',

        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors()->messages());
        }

        $hash_password = Hash::make($request->password);

        // Just discovered this method of hashing password
        // $hash_pwd = password_hash($request->password, PASSWORD_ARGON2ID);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $hash_password,
            'role_id' => config('roles.user'),
        ]);

        $access_token = $this->generate_token($user);


        return $this->successResponse([
            'access_token' => $access_token
        ], 'User registered successfully');
    }


    /**
     * Logout
     **/
    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'logout hz hz',
            'data' => $request->all()
        ]);
        $request->user()->tokens()->delete();

        return $this->successResponse(null, 'logged out');
    }

    /**
     *  Profile
     **/
    public function profile(Request $request)
    {
        return $this->successResponse([
            'user' => $request->user()
        ]);
    }
}
