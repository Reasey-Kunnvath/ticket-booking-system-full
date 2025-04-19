<?php
namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public const HOME = '/';

    /**
     *
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }

    /**
     *
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('khqr', function () {
            return Limit::perMinute(config('services.khqr.rate_limit', 100))->by('khqr');
        });
    }
}
