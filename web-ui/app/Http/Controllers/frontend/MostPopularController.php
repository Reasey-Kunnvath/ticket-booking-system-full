<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MostPopularController extends Controller
{
    public function MostPopularIndex(){
        return view('frontend.event.mostpopular');
    }
}
