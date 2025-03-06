<?php

use App\Http\Controllers\Api\EventCategoryController;
use App\Http\Controllers\Api\EventProviderController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/niger', function () {
    return response()->json([
        'message' => 'Server is up'
    ]);
})->middleware('auth:sanctum');


// auth
Route::post('/register', [AuthController::class, 'user_register']);
Route::post('/user/login', [AuthController::class, 'user_login']);
Route::post('/admin/login', [AuthController::class, 'admin_login']);
Route::post('/event-provider/login', [AuthController::class, 'event_provider_login']);



//  token guard
Route::middleware('auth:sanctum')->group(function () {
    // auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);


    // event provider
    Route::apiResource('event-provider', EventProviderController::class)
        ->only(['store', 'update', 'destroy'])
        ->middleware(['role:admin', 'role:event-provider']);

    Route::apiResource('event-provider', EventProviderController::class)
        ->only(['index', 'show']);


    // event category
    Route::apiResource('event-category', EventCategoryController::class)
        ->only(['store', 'update', 'destroy'])
        ->middleware(['role:admin']);

    Route::apiResource('event-category', EventCategoryController::class)
        ->only(['index', 'show']);


    # Sark type "php artisan route:list --path=api" tv khrnh mean endpoint taing os ng hz
    # Jg somrab controller kron tv pkert function tam endpoint vea muy muy tv (index, store, show, update, destroy)
    # In summary all api endpoint mean double protection with auth:sanctum and role:admin
    # If jg exclude method na muy, can use ->except(['store','update'])
});
