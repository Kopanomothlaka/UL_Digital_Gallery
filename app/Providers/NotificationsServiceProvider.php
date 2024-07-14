<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Mention;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $mentions = Mention::where('user_id', Auth::id())->get();
                $mentionsCount = $mentions->count();
                $view->with('mentionsCount', $mentionsCount);
            }
        });
    }
}
