<?php

namespace App\Http\Middleware;

use App\Core\Services\Alert;
use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class CheckCustomer
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
        if (!Cookie::has('icommerce_customer')) {
            return Redirect::route('login')
                    ->with('error', Alert::format('Oops!', 'You need to log in.'));
        }
        Cookie::queue('icommerce_customer', Cookie::get('icommerce_customer'), 60);
        Cookie::queue('icommerce_customer_sub', Cookie::get('icommerce_customer_sub'), 60);
        Cookie::queue('icommerce_customer_crm', Cookie::get('icommerce_customer_crm'), 60);
        Cookie::queue('icommerce_customer_first_name', Cookie::get('icommerce_customer_first_name'), 60);
        Cookie::queue('icommerce_customer_last_name', Cookie::get('icommerce_customer_last_name'), 60);
        Cookie::queue('icommerce_customer_company_name', Cookie::get('icommerce_customer_company_name'), 60);
        Cookie::queue('icommerce_customer_email', Cookie::get('icommerce_customer_email'), 60);
        Cookie::queue('icommerce_customer_phone', Cookie::get('icommerce_customer_phone'), 60);

        return $next($request);
    }
}
