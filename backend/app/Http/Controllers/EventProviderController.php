<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExampleResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventProviderController extends Controller
{
    //
    public function store(Request $request)
    {
        // ah taing os ng trov move tv "/Controller/Api" folder


        // brer ah nis if we want to process data further
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // By using Validator, we can validate and customize the error response and
        if($validator->fails()) {
            // If validation fails, return error response tv oy user
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages(),
            ], 422);// 422 for unprocessable data
        }

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:8',
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => config('roles.event-provider'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Event provider created successfully',
            'data' => new ExampleResource($user), // kleng nis yg parse thru format dae yg tem build hz knong /Http/Resources/ExampleResource.php
            // in knong test api like postman yg ban format sth like this:
            // data:{
                    // success => true,
                    // message => 'Event provider created successfully',
                    // data: {
                        // id: 1,
                        // name: 'John Doe',
                        // email: '
            // }
        ]);

        // but to sum up, ah os ng yg write knong /Controller/Api folder
    }
}