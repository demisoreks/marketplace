<?php

namespace App\Core\Resellers\Services;

use Illuminate\Support\Facades\Cookie;

trait Login {

    public function login($id) {
        Cookie::queue('icommerce_reseller', $id, 60);
    }

}
