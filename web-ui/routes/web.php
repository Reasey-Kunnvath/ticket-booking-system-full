<?php

use Illuminate\Support\Facades\Route;

#FrontEnd

use Illuminate\Database\Capsule\Manager;

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

# For Frontend
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

Route::controller(CartController::class)->group(function(){
    Route::get('/cart','CartIndex')->name('Cart');
    Route::post('/paymentForm','checkout')->name('payment.form');
    Route::get('/success','processPayment')->name('payment.success');
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
    Route::get('/event-detail','EventDetailIndex')->name('Event-Detail');
});

Route::controller(UserProfileController::class)->group(function(){
    Route::get('/user-profile','UserProfileIndex')->name('User-Profile');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login','LoginIndex')->name('login');
});
