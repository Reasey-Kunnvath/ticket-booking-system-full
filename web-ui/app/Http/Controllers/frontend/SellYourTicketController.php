<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellYourTicketController extends Controller
{
    public function SellYourTicketIndex(){
        return view('frontend.sell-your-ticket.sell_your_ticket');
    }
}
