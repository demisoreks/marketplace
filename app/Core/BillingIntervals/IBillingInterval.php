<?php

namespace App\Core\BillingIntervals;

use App\DBillingInterval;

interface IBillingInterval {

    public function getBillingIntervals();

    public function getBillingIntervalsByActive($active);

    public function createBillingInterval($data);

    public function updateBillingInterval(DBillingInterval $billing_interval, $data);

    public function disable(DBillingInterval $billing_interval);

    public function enable(DBillingInterval $billing_interval);

}
