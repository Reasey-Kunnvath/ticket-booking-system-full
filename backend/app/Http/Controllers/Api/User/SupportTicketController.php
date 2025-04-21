<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SupportTicketController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'message_subject' => 'required',
            'message' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation Error',
                'error' => $validator->messages()
            ],422);
        }

        $supportTicket = SupportTicket::create([
            'message_subject' => $request->message_subject,
            'message' => $request->message,
            'user_id' => $request->user_id
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Ticket Created Successfully',
            'data' => $supportTicket
        ]);
    }
}
