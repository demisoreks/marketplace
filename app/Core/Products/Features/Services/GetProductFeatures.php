<?php

namespace App\Core\Products\Features\Services;

use App\DProduct;
use App\DProductFeature;

trait GetProductFeatures {

    public function getProductFeatures(DProduct $product) {
        $product_features = DProductFeature::where('product_id', $product->id)->get();
        return $product_features;
    }

}
