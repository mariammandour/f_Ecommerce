<?php
namespace App\Providers;

use App\Models\Admin_navbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('*', function($view)
        {
            $navbars = Admin_navbar::orderBy('ordering')->get();
            $view->with('navbars', $navbars);
        });
    }
}
