<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminLoginController extends Controller
{
    public function AdminLoginIndex(){
        return view('backend.admin_login.login_form');
    }
}