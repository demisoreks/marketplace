<?php

namespace App\Core\BillingIntervals\Services;

use App\DBillingInterval;

trait GetBillingIntervals {

    public function getBillingIntervals() {
        $billing_intervals = DBillingInterval::all();
        return $billing_intervals;
    }

    public function getBillingIntervalsByActive($active) {
        $billing_intervals  = DBillingInterval::where('active', $active)->orderBy('months')->get();
        return $billing_intervals;
    }

}
