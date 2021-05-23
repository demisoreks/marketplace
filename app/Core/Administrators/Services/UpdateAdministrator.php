<?php

namespace App\Core\Administrators\Services;

use App\Core\Services\DbRecord;
use App\DAdministrator;

trait UpdateAdministrator {

    public function updateAdministrator(DAdministrator $administrator, $data) {
        $response = [];
        $recordCheck = DbRecord::checkExcept('administrators', ['email' => $data['email']], 'id', $administrator->id);
        if ($recordCheck != "") {
            $response['error'] = $recordCheck;
        } else {
            if ($administrator->update($data)) {
                $response['data'] = $administrator;
            } else {
                $response['error'] = 'Administrator was not updated.';
            }
        }
        return $response;
    }

}
