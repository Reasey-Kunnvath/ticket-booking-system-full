<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function LoginIndex(){
        return view('frontend.login.login_form');
    }

    public function verifyIndex($id){
        return view('frontend.login.verify_form')
                ->with('id', $id);
    }

}