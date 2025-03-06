<?php

use App\Http\Controllers\Api\EventCategoryController;
use App\Http\Controllers\Api\EventProviderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrganizationController;
use Illuminate\Support\Facades\Route;

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
    // /api/admin/event-providers
    // admin full permission
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::apiResource('event-providers', EventProviderController::class)
            ->names('admin.event-providers');
    });

    // /api/provider/event-providers
    // event provider only view and update and create new resource cannot delete or create themselves
    Route::prefix('provider')->middleware('role:event-provider')->group(function () {
        Route::apiResource('event-providers', EventProviderController::class)
            ->only(['index', 'store','show', 'update'])
            ->names('provider.event-providers');
    });

    // general
    Route::apiResource('event-providers', EventProviderController::class)
        ->only(['index', 'show'])
        ->names('event-providers');


    // event category
    Route::apiResource('event-category', EventCategoryController::class)
        ->only(['store', 'update', 'destroy'])
        ->middleware(['role:admin']);

    Route::apiResource('event-category', EventCategoryController::class)
        ->only(['index', 'show']);



    // organization
    Route::apiResource('organization', OrganizationController::class)
        ->only(['store', 'update', 'destroy'])
        ->middleware(['role:admin']);

    Route::apiResource('organization', OrganizationController::class)
        ->only(['index', 'show']);


    # Sark type "php artisan route:list --path=api" tv khrnh mean endpoint taing os ng hz
    # Jg somrab controller kron tv pkert function tam endpoint vea muy muy tv (index, store, show, update, destroy)
    # In summary all api endpoint mean double protection with auth:sanctum and role:admin
    # If jg exclude method na muy, can use ->except(['store','update'])
});