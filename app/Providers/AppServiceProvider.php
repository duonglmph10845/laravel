<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;

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
        //
        
        Paginator::useBootstrap();
        view()->composer('*', function($view){
            $view->with([
                'category' => Category::all(),
            ]);
        });
          
        
    }
}
