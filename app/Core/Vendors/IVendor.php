<?php

namespace App\Core\Vendors;

use App\DVendor;

interface IVendor {

    public function getVendors();

    public function getVendorsByActive($active);

    public function createVendor($data);

    public function updateVendor(DVendor $vendor, $data);

    public function disable(DVendor $vendor);

    public function enable(DVendor $vendor);

}
