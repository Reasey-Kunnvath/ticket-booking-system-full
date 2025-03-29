<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function frontendindex(Request $request)
    {
        $role = $request->logemail;

        session(['role' => $role]);

        if (session('role') && $role == "user" || $role == "admin") {
            return view('frontend.home.index')->with("roles", $role)->with('events', $this->events);
        } else if (!session('role')) {
            return view('frontend.home.index')->with("roles", $role)->with('events', $this->events);
        } else {
            return back()->withErrors(['error' => 'Invalid role or user not found']);
        }
    }
}
