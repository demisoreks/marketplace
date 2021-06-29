<?php

namespace App\Http\Middleware;

use App\Core\Services\BackOffice;
use App\Core\Services\Configuration;
use App\Core\Services\Site;
use Closure;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CheckConfiguration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Schema::hasTable('configuration')) {
            Artisan::call('migrate', ['--path' => 'database/migrations', '--force' => true]);
        }

        $site = new Site;
        View::share('site', $site);

        return $next($request);
    }
}
