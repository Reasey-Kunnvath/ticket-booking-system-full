<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function UserProfileIndex(){
        return view('frontend.user_profile.user_profile_index');
    }
}
