<?php

namespace App\Core\Administrators\Services;

use Illuminate\Support\Facades\Cookie;

trait Logout {

    public function logout() {
        Cookie::queue(Cookie::forget('icommerce_admin'));
    }

}
