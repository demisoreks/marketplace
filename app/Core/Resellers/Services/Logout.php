<?php

namespace App\Core\Resellers\Services;

use Illuminate\Support\Facades\Cookie;

trait Logout {

    public function logout() {
        Cookie::queue(Cookie::forget('icommerce_reseller'));
        Cookie::queue(Cookie::forget('icommerce_reseller_name'));
    }

}
