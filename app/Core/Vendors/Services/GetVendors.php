<?php

namespace App\Core\Vendors\Services;

use App\DVendor;

trait GetVendors {

    public function getVendors() {
        $vendors = DVendor::all();
        return $vendors;
    }

    public function getVendorsByActive($active) {
        $vendors = DVendor::where('active', $active)->get();
        return $vendors;
    }

}
