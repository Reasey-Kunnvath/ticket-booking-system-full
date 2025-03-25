<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllEventController extends Controller
{
    public function AllEventindex(){
        return view('frontend.event.allEvent');
    }
}
