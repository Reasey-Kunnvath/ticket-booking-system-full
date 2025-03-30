<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
    */
    public function index(Request $request)
    {
        $users = User::with('role')->orderBy('created_at', 'desc')->paginate($request->limit??10);
        if($users->count() < 0){
            return response()->json([
                'success' => true,
                'message' => 'No User Available'
            ],200);
        }else{
            return response()->json([
                'success' => true,
                'data' => $users
            ],200);
        }
        // UserResource::collection($users)
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        return $this->successResponse($request->all());
        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return $this->successResponse($user);
    }

    public function show(User $user)
    {
        return $this->successResponse($user);
    }

    public function update(Request $request,)
    {
        $user = User::find($request->id);

        if (!$user) {
            return $this->notFoundResponse("User not found");
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse($validator->errors());
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'user updated successfully',
            'data' => new UserResource($user)
        ],200);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return $this->notFoundResponse("User not found");
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'user deleted successfully'
        ],200);
    }
}
