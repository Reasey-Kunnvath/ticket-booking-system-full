<?php

use Illuminate\Support\Facades\Route;

#FrontEnd

use Illuminate\Database\Capsule\Manager;
# For Frontend
use App\Http\Controllers\frontend\{
    FrontendController,
    AllEventController,
    ConcertController,
    ConferenceController,
    SportController,
    AboutController,
    HelpController,
    CartController,
    EventDetailController,
    MostPopularController,
    SellYourTicketController,
    UpcomingController,
    UserProfileController,
    LoginController
};

#for Backend

use App\Http\Controllers\backend\{
    DashboardController,
    adminLoginController
};


Route::controller(FrontendController::class)->group(function(){
    Route::get('/','frontendindex')->name('Home');
});

Route::controller(AllEventController::class)->group(function(){
    Route::get('/all-event','AllEventindex')->name('All-Events');
});

Route::controller(ConcertController::class)->group(function(){
    Route::get('/concert','ConcertIndex')->name('Concert');
});

Route::controller(ConferenceController::class)->group(function(){
    Route::get('/conference','ConferenceIndex')->name('Conference');
});

Route::controller(SportController::class)->group(function(){
    Route::get('/sport','SportIndex')->name('Sport');
});

Route::controller(AboutController::class)->group(function(){
    Route::get('/about','AboutIndex')->name('About');
});

Route::controller(HelpController::class)->group(function(){
    Route::get('/help-center','HelpCenterIndex')->name('Help-Center');
});



Route::controller(SellYourTicketController::class)->group(function(){
    Route::get('/sell-your-ticket','SellYourTicketIndex')->name('Sell-Your-Ticket');
});

Route::controller(UpcomingController::class)->group(function(){
    Route::get('/upcoming-event','UpcomingIndex')->name('Upcoming-Events');
});

Route::controller(MostPopularController::class)->group(function(){
    Route::get('/most-popular-event','MostPopularIndex')->name('Most-Popular-Events');
});

Route::controller(EventDetailController::class)->group(function(){
    Route::get('/event-detail/{id}','EventDetailIndex')->name('Event-Detail');
});



Route::middleware(['guest.route'])->group(function () {
    Route::controller(UserProfileController::class)->group(function(){
        Route::get('/user-profile','UserProfileIndex')->name('User-Profile');
    });

    Route::controller(CartController::class)->group(function(){
        Route::get('/cart','CartIndex')->name('Cart');
    });
});


Route::controller(LoginController::class)->group(function(){
    Route::get('/login','LoginIndex')->name('login');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login/verify/{id}','verifyIndex')->name('verify');
});

# For Backend
// Route::controller(DashboardController::class)->group(function(){
//     Route::get('/dashboard','index')->name('dashboard');
// });

Route::controller(adminLoginController::class)->group(function(){
    Route::get('/admin/login','AdminLoginIndex')->name('Admin.login');
});

Route::prefix('admin')->controller(DashboardController::class)->group(function(){
    Route::get('/dashboard','index')->name('dashboard');
});