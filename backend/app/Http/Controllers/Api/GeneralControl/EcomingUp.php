<?php

namespace App\Http\Controllers\Api\GeneralControl;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class EcomingUp extends Controller
{
public function index()
{
    $evcoming = DB::table('events')->get();
    // dd($evcoming);
    return response()->json([
        'data' => $evcoming,
        'message' => 'This is the index method of the EcomingUp controller.'
    ]);
}
}
