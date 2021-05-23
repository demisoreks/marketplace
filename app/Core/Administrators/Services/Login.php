<?php

namespace App\Core\Administrators\Services;

use App\DAdministrator;
use Illuminate\Support\Facades\Cookie;

trait Login {

    public function login(DAdministrator $administrator) {
        Cookie::queue('icommerce_admin', $administrator->slug(), 60);
    }

}
