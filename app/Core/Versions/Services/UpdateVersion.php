<?php

namespace App\Core\Versions\Services;

use App\Core\Services\DbRecord;
use App\DVersion;

trait UpdateVersion {

    public function updateVersion(DVersion $version, $data) {
        $response = [];
        $record_check = DbRecord::checkExcept('versions', ['name' => $data['name']], 'id', $version->id);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            if ($version->update($data)) {
                $response['data'] = $version;
            } else {
                $response['error'] = "Version was not updated.";
            }
        }
        return $response;
    }

}
