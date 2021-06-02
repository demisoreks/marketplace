<?php

namespace App\Core\Products\Requirements\Services;

use App\DProduct;
use App\DProductRequirement;

trait GetProductRequirements {

    public function getProductRequirements(DProduct $product) {
        $product_requirements = DProductRequirement::where('product_id', $product->id)->get();
        return $product_requirements;
    }

}
