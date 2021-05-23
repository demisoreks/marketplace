<?php

namespace App\Core\Administrators\Services;

use App\Core\Services\DbRecord;
use App\DAdministrator;

trait CreateAdministrator {

    public function createAdministrator($data) {
        $response = [];
        $recordCheck = DbRecord::check('administrators', ['email' => $data['email']]);
        if ($recordCheck != "") {
            $response['error'] = $recordCheck;
        } else {
            $administrator = DAdministrator::create($data);
            if ($administrator) {
                $response['data'] = $administrator;
            } else {
                $response['error'] = 'Administrator was not created.';
            }
        }
        return $response;
    }

}
