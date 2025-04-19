<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PartnershipDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PartnershipRequestController extends Controller
{
    public function partnership_request(Request $request){
        $validator = Validator::make($request->all(), [
            'orgName' => 'required|string',
            'orgType' => 'required|string',
            'orgAddress' => 'required|string',
            'orgEmail' => 'required|string',
            'orgPhone' => 'required|string',
            'fullName' => 'required|string',
            'email' => 'required|string',
            'phoneNumber' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' => $validator->messages(),
            ],422);
        }

        $partnership = PartnershipDetail::create([
            'org_name' => $request->orgName,
            'org_type' => $request->orgType,
            'org_address' => $request->orgAddress,
            'org_email' => $request->orgEmail,
            'org_phone_number' => $request->orgPhone,
            'ambassador_name' => $request->fullName,
            'ambassador_email' => $request->email,
            'ambassador_phone' => $request->phoneNumber
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Partnership request sent successfully',
            'data' => $partnership
        ]);
    }
}