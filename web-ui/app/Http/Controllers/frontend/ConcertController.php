<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function ConcertIndex(){
        return view('frontend.event.concert');
    }
}
