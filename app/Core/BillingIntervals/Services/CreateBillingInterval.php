<?php

namespace App\Core\BillingIntervals\Services;

use App\Core\Services\DbRecord;
use App\DBillingInterval;

trait CreateBillingInterval {

    public function createBillingInterval($data) {
        $response = [];
        $record_check = DbRecord::check('billing_intervals', ['name' => $data['name'], 'months' => $data['months']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $billing_interval = DBillingInterval::create($data);
            if ($billing_interval) {
                $response['data'] = $billing_interval;
            } else {
                $response['error'] = "Billing interval was not created.";
            }
        }
        return $response;
    }

}
