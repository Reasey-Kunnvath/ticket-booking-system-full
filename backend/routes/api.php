<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventProviderController;

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'user_register']);

Route::post('/user/login', [AuthController::class, 'user_login']);
Route::post('/admin/login', [AuthController::class, 'admin_login']);
Route::post('/event-provider/login', [AuthController::class, 'event_provider_login']);

Route::middleware('auth:sanctum')->group(function () {
    # pkert route api auto (GET, POST, PUT, DELETE,...)
    // Route::apiResource('event-provider/admin', EventProviderController::class)
    //         ->middleware('role:admin');

    // Route::apiResource('event-provider/{value?}', EventProviderController::class)
    //         ->middleware('role:event-provider');

    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::apiResource('event-providers', EventProviderController::class)
            ->names('admin.event-providers');
            # Admin has full controll on event provider
            # Route: /api/admin/event-providers
    });


    Route::prefix('provider')->middleware('role:event-provider')->group(function () {
        Route::apiResource('event-providers/', EventProviderController::class)
            ->names('provider.event-providers')
            ->only(['index', 'show', 'update']);
            # Event provider can only view and update their own profile
            # Route: /api/provider/event-providers
    });
});
