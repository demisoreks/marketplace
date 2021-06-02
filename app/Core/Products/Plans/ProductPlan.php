<?php

namespace App\Core\Products\Plans;

use App\Core\Products\Plans\Services\CreateProductPlan;
use App\Core\Products\Plans\Services\GetProductPlans;
use App\Core\Services\Delete;

class ProductPlan implements IProductPlan {

    use GetProductPlans, CreateProductPlan, Delete;

}
