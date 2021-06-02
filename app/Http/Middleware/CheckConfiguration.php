<?php

namespace App\Http\Middleware;

use App\Core\Services\Configuration;
use Closure;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;

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

        $configuration = Configuration::get();
        if ($configuration == null) {
            return Redirect::route('configuration');
        } else {
            Cookie::queue('configuration', $configuration, 60);
        }

        return $next($request);
    }
}
