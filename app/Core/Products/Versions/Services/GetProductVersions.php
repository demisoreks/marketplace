<?php

namespace App\Core\Products\Versions\Services;

use App\DProduct;
use App\DProductVersion;

trait GetProductVersions {

    public function getProductVersions(DProduct $product) {
        $product_versions = DProductVersion::where('product_id', $product->id)->get();
        return $product_versions;
    }

}
