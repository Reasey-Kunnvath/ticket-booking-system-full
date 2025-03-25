<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function HelpCenterIndex(){
        return view('frontend.help_center.help-center');
    }
}
