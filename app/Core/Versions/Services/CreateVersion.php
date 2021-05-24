<?php

namespace App\Core\Versions\Services;

use App\Core\Services\DbRecord;
use App\DVersion;

trait CreateVersion {

    public function createVersion($data) {
        $response = [];
        $record_check = DbRecord::check('versions', ['name' => $data['name']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
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
