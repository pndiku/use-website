<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Kreait\Firebase\Factory;

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
        //$serviceAccount = ServiceAccount::fromJsonFile(base_path().'/faang.json');
        //dd(base_path().'/faang.json');
        /**$auth = (new Factory)
            ->withServiceAccount(base_path().'/faang.json')
            ->createAuth();

        $this->app->instance('firebaseauth', $auth);**/
        Paginator::useBootstrap();

    }
}
