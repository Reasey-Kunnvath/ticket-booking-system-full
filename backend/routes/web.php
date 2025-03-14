<?php

use App\Http\Controllers\Api\Admin\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
