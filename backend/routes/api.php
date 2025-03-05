<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventProviderController;
use Illuminate\Support\Facades\Route;

Route::get('/niger', function () {
    return response()->json([
        'message' => 'Server is up'
    ]);
})->middleware('auth:sanctum');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'user_register']);

Route::post('/user/login', [AuthController::class, 'user_login']);
Route::post('/admin/login', [AuthController::class, 'admin_login']);
Route::post('/event-provider/login', [AuthController::class, 'event_provider_login']);


// Route::prefix('event-provider')->middleware('auth:sanctum')->group(function () {
//     only admin ban create event provider ban trov ot
//     if ot trov jam kae tam ng tov bro
//     Route::post('/', [EventProviderController::class, 'store'])->middleware('role:admin');
// });

Route::middleware('auth:sanctum')->group(function () {
    # pkert route api auto (GET, POST, PUT, DELETE,...)
    Route::apiResource('event-provider', EventProviderController::class)->middleware('role:admin');

    # Sark type "php artisan route:list --path=api" tv khrnh mean endpoint taing os ng hz
    # Jg somrab controller kron tv pkert function tam endpoint vea muy muy tv (index, store, show, update, destroy)
    # In summary all api endpoint mean double protection with auth:sanctum and role:admin
    # If jg exclude method na muy, can use ->except(['store','update'])
});