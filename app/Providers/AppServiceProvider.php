<?php
namespace App\Providers;

use App\Models\Admin_navbar;
use App\Models\message;
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
            $messages_nav= message::orderBy('created_at')->limit(1)->get();
            $messages_count= message::orderBy('created_at')->get()->count();
            $view->with(['navbars'=>$navbars,'messages_nav'=>$messages_nav,'messages_count'=>$messages_count]);
        });
    }
}
