<?php

use App\Http\Controllers\Api\EventCategoryController;
use App\Http\Controllers\Api\EventProviderController;
use App\Http\Controllers\Api\Admin\{
    // renaming controller to avoid conflict
    DashboardController as AdminDashboardController,
    PayoutController as AdminPayoutController,
    UserController as AdminUserController,
    RoleController as AdminRoleController,
    CouponController as AdminCouponController,
    OrderController as AdminOrderController,
    TransactionController as AdminTransactionController,
    PartnershipController as AdminPartnershipController,
    SupportTicketController as AdminSupportTicketController,
    EventCategoryController as AdminEventCategoryController,
    EventController as AdminEventController
};
use App\Http\Controllers\Api\Event_provider\{
    DashboardController as EPDashboardController,
    EventController as EPEventController,
    AnalyticsController as EPAnalyticsController,
    RequestPayoutController as EPRequestPayoutController,
    SupportTicketController as EPSupportTicketController
};

use App\Http\Controllers\Api\User\{
    ProfileController as UProfileController,
    OrderController as UOrderController,
    BillingInfoController as UBillingInfoController,
    HomeController as UHomeController,
    EventController as UEventController,
    SupportTicketController as USupportTicketController,
    CartController as UCartController,
    ChangePasswordController,
    CouponController as UCouponController
};
use App\Http\Controllers\Api\PartnershipRequestController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\General\Event\FEventController;
use App\Http\Controllers\Api\General\Event\FEventDetailControll;
use App\Http\Controllers\Api\General\Event\FEventDetailController;
use Illuminate\Support\Facades\Route;

// auth
Route::post('/register', [AuthController::class, 'user_register']);
Route::post('/register/verify/{id}', [AuthController::class, 'verify_email']);
Route::post('/user/login', [AuthController::class, 'user_login']);
Route::post('/admin/login', [AuthController::class, 'admin_login']);
Route::post('/event-provider/login', [AuthController::class, 'event_provider_login']);



//  token guard
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::apiResource('home', UHomeController::class)
    ->names('guest.home')
    ->only(['index', 'show']);


    // For role == admin
    //Route: /api/v1/admin/resourcename
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        // Route::apiResource('event-providers', EventProviderController::class)
        //     ->names('admin.event-providers');
        // for dashboard
        Route::apiResource('dashboard', AdminDashboardController::class)
            ->names('admin.dashboard');

        // for roles
        Route::apiResource('roles', AdminRoleController::class)
            ->names('admin.roles');

        // for financials (Sales and Analytics, Review Payout Request, and orders)
        Route::apiResource('orders', AdminOrderController::class)
            ->names('admin.orders');
        Route::apiResource('transactions', AdminTransactionController::class)
            ->names('admin.transactions');
        Route::apiResource('payouts', AdminPayoutController::class)
            ->names('admin.payouts');

        // for support ticket
        Route::apiResource('support-ticket', AdminSupportTicketController::class)
            ->names('admin.support-ticket');

        // for users and roles
        Route::apiResource('users', AdminUserController::class)
            ->names('admin.users');
        Route::apiResource('roles', AdminRoleController::class)
            ->names('admin.roles');

        // for events and event category
        Route::apiResource('Events', AdminEventController::class)
            ->names('admin.events');
        Route::apiResource('event-category', AdminEventCategoryController::class)
            ->names('admin.event-category');

        // for coupons
        Route::apiResource('coupons', AdminCouponController::class)
            ->names('admin.coupons');

        // for partnerships
        Route::apiResource('partnerships', AdminPartnershipController::class)
            ->names('admin.partnerships');
    });

    // For role == event-provider
    //Route: /api/v1/provider/resourcename
    Route::prefix('provider')->middleware('role:event-provider')->group(function () {
        // for dashboard
        Route::apiResource('dashboard', EPDashboardController::class)
            ->names('provider.dashboard')
            ->only(['index']);

        // for events
        Route::apiResource('events', EPEventController::class)
            ->names('provider.events');

        // for financials (Sales and Analytics, Request Payout)
        Route::apiResource('analytics', EPAnalyticsController::class)
            ->names('provider.analytics')
            ->only(['index']);
        Route::apiResource('request-payout', EPRequestPayoutController::class)
            ->names('provider.request-payout')
            ->only(['index', 'store']);

        // for support tickets
        Route::apiResource('support-ticket', EPSupportTicketController::class)
            ->names('provider.support-ticket')
            ->only(['index', 'show', 'store']);
    });

    // For role == user
    //Route: /api/v1/user/resourcename
    Route::prefix('user')->middleware('role:user')->group(function () {
        // for profile section
        Route::prefix('profile')->group(function () {
            Route::apiResource('information', UProfileController::class)
                ->names('user.profile.information')
                ->only(['index', 'show', 'update']);
            Route::apiResource('order-history', UOrderController::class)
                ->names('user.profile.order-history')
                ->only(['index', 'show']);
            Route::apiResource('change-password', ChangePasswordController::class)
                ->names('user.profile.change-password')
                ->only(['update']);
            Route::apiResource('billing-information', UBillingInfoController::class)
                ->names('user.profile.billing-information')
                ->only(['index', 'show', 'update']);
        });

        // for home
        Route::apiResource('home', UHomeController::class)
            ->names('user.home')
            ->only(['index', 'show']);


        // for all events and event by category
        Route::get('events', [UEventController::class, 'index'])
            ->name('user.event.index');
        Route::get('events/{category_name}', [UEventController::class, 'byCategory'])
            ->name('user.event.byCategory');

        // for support tickets
        Route::apiResource('support-ticket', USupportTicketController::class)
            ->names('user.support-ticket')
            ->except(['update']);

        // for cart
        Route::apiResource('cart', UCartController::class)
            ->names('user.cart')
            ->only(['index', 'store', 'update', 'destroy']);

        Route::apiResource('coupon', UCouponController::class)
            ->names('user.coupon')
            ->only(['index', 'show']);

        // for partnership request
        Route::post('/become-a-partner', [PartnershipRequestController::class, 'partnership_request']);
    });

    // general
    // Route::apiResource('event-providers', EventProviderController::class)
    //     ->only(['index', 'show'])
    //     ->names('event-providers');


    // event category
    // Route::apiResource('event-category', EventCategoryController::class)
    //     ->only(['store', 'update', 'destroy'])
    //     ->middleware(['role:admin']);

    // Route::apiResource('event-category', EventCategoryController::class)
    //     ->only(['index', 'show']);



    // organization
    // Route::apiResource('organization', OrganizationController::class)
    //     ->only(['store', 'update', 'destroy'])
    //     ->middleware(['role:admin']);

    // Route::apiResource('organization', OrganizationController::class)
    //     ->only(['index', 'show']);

    # In summary all api endpoint mean double protection with auth:sanctum and role:admin
    # If jg exclude method na muy, can use ->except(['store','update'])
});

// General Route Accsess to Frontend/User Interface
    Route::controller(FEventController::class)->group(function () {
        Route::get('/allevent', 'allevent')->name('allevent');
        Route::get('/eventcoming', 'eventcoming')->name('eventcoming');
        Route::get('/mostpopular', 'mostpopular')->name('mostpopular');
        Route::get('/concert', 'concert')->name('concert');
        Route::get('/conferences', 'conferences')->name('conferences');
        Route::get('/sport', 'sport')->name('sport');
});
    Route::controller(FEventDetailController::class)->group(function () {
        Route::get('/eventdetail/{id}', 'EventDetailIndex')->name('eventdetail');
    });