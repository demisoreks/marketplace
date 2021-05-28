<?php

namespace App\Core\BillingIntervals\Services;

use App\Core\Services\DbRecord;
use App\DBillingInterval;

trait UpdateBillingInterval {

    public function updateBillingInterval(DBillingInterval $billing_interval, $data) {
        $response = [];
        $record_check = DbRecord::checkExcept('billing_intervals', ['name' => $data['name'], 'months' => $data['months']], 'id', $billing_interval->id);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            if ($billing_interval->update($data)) {
                $response['data'] = $billing_interval;
            } else {
                $response['error'] = "Billing interval was not updated.";
            }
        }
        return $response;
    }

}
