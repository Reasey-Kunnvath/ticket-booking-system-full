<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return response()->json([
            "success" => true,
            "message" => "Dashboard for Admin is up and running!"
        ],200);
    }

    public function store(Request $request){
        return response()->json([
            "message" => "Admin Dashboard with store method is up and running",
            "data" => $request->user()
        ],200);
    }

    public function show(Request $request){
        return response()->json([
            "message" => "Admin Dashboard with show method is up and running",
            "data" => $request->user()
        ],200);
    }
}
