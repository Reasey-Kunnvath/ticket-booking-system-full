<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    public function generate_six_digits_token(){
        return rand(100000, 999999);
    }

    public function sendEmail($email,$data)
    {
        Mail::to($email)->send(new VerifyEmail($data));
    }

    public function verify_email(Request $request, $id){
        $user = User::where('id', $id)->first();

        if(!$user->verifyToken == $request[0] || !$user->verifyToken == $request){
            return response()->json([
                'message' => 'invalid token' . $user,
                'request' => $request
            ]);
        }

        User::where('id', $user->id)->update([
            'email_verified_at' => now(),
            'verifyToken' => null
        ]);

        return response()->json([
            'message' => 'email verified',
            'access_token' => $this->generate_token($user)
        ]);
    }
    private function login_handler($request, $role_id)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // return $this->unauthorizedResponse("Invalid credentials");
            return response()->json([
                'message' => 'Invalid credentials'
            ]);
        }

        $valid_role = $this->role_check($user, $role_id);

        if (!$valid_role) {
            return $this->forbiddenResponse("Login Khos Portal hz BB");
        }

        $isVerified = $user->email_verified_at;

        if (!$isVerified) {
            $verifyToken = $this->generate_six_digits_token();

            User::where('id', $user->id)->update([
                'verifyToken' => $verifyToken
            ]);

            $this->sendEmail($user->email,[
                'verifyToken' => $verifyToken,
                'user' => $user,
                'timestamp' => now(),
            ]);

            return $this->successResponse([
                'verified' => false,
                'message' => 'Email not verified',
                'user' => $user
            ]);
        }else{
            return $this->successResponse([
                'verified' => true,
                'access_token' => $this->generate_token($user),
                'user' => $user
            ]);
        }
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
            // return $this->badRequestResponse($validator->errors()->messages());
            return response()->json([
                'message' => $validator->errors()->messages()
            ]);
        }

        $hash_password = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $hash_password,
            'role_id' => config('roles.user'),
        ]);

        return $this->login_handler($request, config('roles.user'));

        // $access_token = $this->generate_token($user);


        // return $this->successResponse([
        //     'success' => true,
        //     'access_token' => $access_token,
        //     'isVerified' => false
        // ], 'User registered successfully');
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
            return response()->json([
                'message' => $validator->errors()->messages()
            ]);
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
