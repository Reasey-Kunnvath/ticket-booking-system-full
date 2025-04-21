<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeaderController extends Controller
{
    public function index(Request $request){
        $cart = Cart::where('user_id', $request->query('user_id'))->count();

        return response()->json([
            'status' => 'success',
            'data' => $cart,
        ]);
    }
}
