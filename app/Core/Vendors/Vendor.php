<?php

namespace App\Core\Vendors;

use App\Core\Services\Disable;
use App\Core\Services\Enable;
use App\Core\Vendors\Services\CreateVendor;
use App\Core\Vendors\Services\GetVendors;
use App\Core\Vendors\Services\UpdateVendor;

class Vendor implements IVendor {

    use GetVendors, CreateVendor, UpdateVendor, Disable, Enable;

}
