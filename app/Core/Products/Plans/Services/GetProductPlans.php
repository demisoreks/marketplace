<?php

namespace App\Core\Products\Plans\Services;

use App\DProduct;
use App\DProductPlan;

trait GetProductPlans {

    public function getProductPlans(DProduct $product) {
        $product_plans = DProductPlan::where('product_id', $product->id)->get();
        return $product_plans;
    }

}
