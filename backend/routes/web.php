<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\EventController;

Route::get('/', function () {
    return view('email.emailTemplate');
});

Route::get('/verify-email', function (Request $request) {
    return view('email.verifyEmail', [
        'user_id' => $request->query('user_id'),
        'token' => $request->query('token'),
    ]);
});