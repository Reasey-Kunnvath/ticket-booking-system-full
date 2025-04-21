<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function HelpCenterIndex(Request $request){


        return view('frontend.help_center.help-center')->with([
            'userId' => $request->query('uid'),
            'token' => $request->query('token'),
        ]);
    }
}
