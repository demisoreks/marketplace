<?php

namespace App\Core\Products\Plans;

use App\DProduct;
use App\DProductPlan;
use App\DVersion;

interface IProductPlan {

    public function getProductPlans(DProduct $product);

    public function getProductPlansByVersion(DProduct $product, DVersion $version);

    public function createProductPlan(DProduct $product, $data);

    public function updateProductPlan(DProductPlan $product_plan, $data);

    public function delete(DProductPlan $product_plan);

}
