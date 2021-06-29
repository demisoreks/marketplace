<?php

namespace App\Core\Resellers\Services;

use Illuminate\Support\Facades\Cookie;

trait GetId {

    public function getId() {
        return Cookie::get('icommerce_reseller');
    }

}
