<?php

namespace App\Core\Administrators\Services;

use App\DAdministrator;

trait Authenticate {

    public function authenticate($email, $password) {
        $administrators = DAdministrator::where('email', $email)->where('password', $password)->where('active', true);
        if ($administrators->count() == 0) {
            return null;
        } else {
            $administrator = $administrators->first();
            return $administrator;
        }
    }

}
