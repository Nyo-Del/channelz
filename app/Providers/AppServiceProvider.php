<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrap();
        View::composer('master', function ($view) {

            $ads = Ad::select('adpic')->where('action', 1)->get();

            $categories = Category::select('Cname', 'id')->orderBy('created_at', 'desc')->get();

            $admins = User::select('name','nickname','picture')->orderBy('created_at','asc')->get();

            $view->with([
                'ads' => $ads,
                'categories' => $categories,
                'admins' => $admins,
            ]);
        });


    }

}
