<?php

namespace App\Core\Vendors\Services;

use App\Core\Services\DbRecord;
use App\DVendor;

trait UpdateVendor {

    public function updateVendor(DVendor $vendor, $data) {
        $response = [];
        $record_check = DbRecord::checkExcept('vendors', ['name' => $data['name']], 'id', $vendor->id);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            if ($vendor->update($data)) {
                $response['data'] = $vendor;
            } else {
                $response['error'] = "Vendor was not updated.";
            }
        }
        return $response;
    }

}
