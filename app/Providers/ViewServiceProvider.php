<?php

namespace App\Providers;

use App\Http\View\Composers\ProfileComposer;
use App\Http\View\Composers\StudentDashboardComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer("*",ProfileComposer::class);
        View::composer("student.dashboard",StudentDashboardComposer::class);
    }
}
