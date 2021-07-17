<?php

namespace App\Core\Products\Plans\Services;

use App\DProduct;
use App\DProductPlan;
use App\DVersion;

trait GetProductPlans {

    public function getProductPlans(DProduct $product) {
        $product_plans = DProductPlan::where('product_id', $product->id)->get();
        return $product_plans;
    }

    public function getProductPlansByVersion(DProduct $product, DVersion $version) {
        $product_plans = DProductPlan::where('product_id', $product->id)->where('version_id', $version->id)->get();
        return $product_plans;
    }

}
