<?php

namespace App\Core\Versions\Services;

use App\Core\Services\DbRecord;
use App\DVersion;

trait CreateVersion {

    public function createVersion($data) {
        $response = [];
        $recordCheck = DbRecord::check('versions', ['name' => $data['name']]);
        if ($recordCheck != "") {
            $response['error'] = $recordCheck;
        } else {
            $version = DVersion::create($data);
            if ($version) {
                $response['data'] = $version;
            } else {
                $response['error'] = "Version was not created.";
            }
        }
        return $response;
    }

}
