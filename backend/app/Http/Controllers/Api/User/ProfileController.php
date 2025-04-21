<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Storage;


class ProfileController extends Controller
{
    public function index(Request $request)
    {

        $user = User::find($request->query('user_id'));

        if (!$user) {
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

    public function update_profile(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('image');
        $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put($filename, file_get_contents($file));
        $user = User::find(auth()->user()->id);

        $user->update([
            'profile' => $filename
        ]);
        return $this->successResponse($filename);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'profile' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' => $validator->messages(),
            ], 422);
        }

        $user = User::find($id);

        if (!$user) {
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
