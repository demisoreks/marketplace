<?php

namespace App\Http\Middleware;

use App\Core\Services\Alert;
use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class CheckReseller
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
        if (!Cookie::has('icommerce_reseller')) {
            return Redirect::route('pos_index')
                    ->with('error', Alert::format('Oops!', 'You need to log in.'));
        }
        Cookie::queue('icommerce_reseller', Cookie::get('icommerce_reseller'), 60);

        return $next($request);
    }
}
