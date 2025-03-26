<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpcomingEventController extends Controller
{
    public function index(){
        $event = DB::table('events')->get();


            return response()->json([
                'data' => $event
            ],200);
    }
}
