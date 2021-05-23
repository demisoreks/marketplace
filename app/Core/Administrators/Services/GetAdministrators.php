<?php

namespace App\Core\Administrators\Services;

use App\DAdministrator;

trait GetAdministrators {

    public function getAdministrators() {
        $administrators = DAdministrator::all();
        return $administrators;
    }

    public function getAdministratorsByActive($active) {
        $administrators = DAdministrator::where('active', $active)->get();
        return $administrators;
    }

}
