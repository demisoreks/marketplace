<?php

namespace App\Core\Vendors\Services;

use App\Core\Services\DbRecord;
use App\DVendor;

trait CreateVendor {

    public function createVendor($data) {
        $response = [];
        $record_check = DbRecord::check("vendors", ['name' => $data['name']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $vendor = DVendor::create($data);
            if ($vendor) {
                $response['data'] = $vendor;
            } else {
                $response['error'] = "Vendor was not created.";
            }
        }
        return $response;
    }

}
