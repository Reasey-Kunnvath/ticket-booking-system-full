<?php

namespace App\Http\Controllers\Api\User;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' => $validator->messages(),
            ], 422);
        }

        $user = User::find($id);

        return response()->json([
            'message' => 'User Not Found',
            'opwd' => $user->password,
            'cpwd' => Hash::make($request->current_password),
        ], 404);

        // if(!Hash::check($request->current_password, $user->password)){
        //     return response()->json([
        //         'message' => 'Current password is incorrect',
        //     ], 422);
        // }

        // if ($request->current_password == $request->new_password) {
        //     return response()->json([
        //         'message' => 'New password cannot be the same as current password',
        //     ], 422);
        // }


        // $user->password = Hash::make($request->password);
        // $user->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Password updated successfully',
        //     'data' => $user,
        // ], 200);
    }
}
