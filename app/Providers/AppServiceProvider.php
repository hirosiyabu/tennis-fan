<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // herokuマイグレーション用
        Schema::defaultStringLength(191);

        // 本番環境(Heroku)でhttpsを強制する
        if (\App::environment('heroku')) {
            \URL::forceScheme('http');
        }
    }
}
