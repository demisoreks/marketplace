<?php

namespace App\Core\Products\Plans;

use App\DProduct;
use App\DProductPlan;

interface IProductPlan {

    public function getProductPlans(DProduct $product);

    public function createProductPlan(DProduct $product, $data);

    public function delete(DProductPlan $product_plan);

}
