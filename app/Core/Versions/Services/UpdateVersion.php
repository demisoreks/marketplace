<?php

namespace App\Core\Versions\Services;

use App\Core\Services\DbRecord;
use App\DVersion;

trait UpdateVersion {

    public function updateVersion(DVersion $version, $data) {
        $response = [];
        $recordCheck = DbRecord::checkExcept('versions', ['name' => $data['name']], 'id', $version->id);
        if ($recordCheck != "") {
            $response['error'] = $recordCheck;
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
