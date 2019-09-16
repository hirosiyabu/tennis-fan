<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    
    public function boot()
    {
        // herokuマイグレーション用
        Schema::defaultStringLength(191);

        // 本番環境(Heroku)でhttpsを強制する
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
    }
        
    
}

