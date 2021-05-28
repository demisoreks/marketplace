<?php

namespace App\Core\BillingIntervals;

use App\Core\BillingIntervals\Services\CreateBillingInterval;
use App\Core\BillingIntervals\Services\GetBillingIntervals;
use App\Core\BillingIntervals\Services\UpdateBillingInterval;
use App\Core\Services\Disable;
use App\Core\Services\Enable;

class BillingInterval implements IBillingInterval {

    use GetBillingIntervals, CreateBillingInterval, UpdateBillingInterval, Disable, Enable;

}
