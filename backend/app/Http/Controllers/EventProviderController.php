<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EventProviderController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => config('roles.event-provider'),
        ]);

        return response()->json([
            'message' => 'Event provider created successfully',
            'event_provider' => $user,
        ]);
    }
}
