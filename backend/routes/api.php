<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventProviderController;
use Illuminate\Support\Facades\Route;

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'user_register']);

Route::post('/user/login', [AuthController::class, 'user_login']);
Route::post('/admin/login', [AuthController::class, 'admin_login']);
Route::post('/event-provider/login', [AuthController::class, 'event_provider_login']);


Route::prefix('event-provider')->middleware('auth:sanctum')->group(function () {
    // only admin ban create event provider ban trov ot
    // if ot trov jam kae tam ng tov bro
    Route::post('/', [EventProviderController::class, 'store'])->middleware('role:admin');
});
