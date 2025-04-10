<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request) {

        $user = User::find($request->query('user_id'));

        if(!$user) {
            return response()->json([
                'message' => 'User Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'message' => 'Success',
            'data' => $user
        ]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' => $validator->messages(),
            ],422);
        }

        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'message' => 'User Not Found',
                'data' => null
            ], 404);
        }

        $user->update($request->all());

        return response()->json([
            'message' => 'Success',
            'data' => $user
        ]);
    }
}