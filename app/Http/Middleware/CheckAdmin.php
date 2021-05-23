<?php

namespace App\Http\Middleware;

use App\Core\Services\Alert;
use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class CheckAdmin
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
        if (!Cookie::has('icommerce_admin')) {
            return Redirect::route('admin_index')
                    ->with('error', Alert::format('Oops!', 'You need to log in.'));
        }
        Cookie::queue('icommerce_admin', Cookie::get('icommerce_admin'), 60);

        return $next($request);
    }
}
