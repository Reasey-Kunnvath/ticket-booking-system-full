<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Coupons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{

    public function index(){
        $coupons = Coupons::all();

        return response()->json([
            'status' => true,
            'message' => 'Coupons fetched successfully',
            'data' => $coupons,
        ],200);
    }

    public function show(){

    }
}
