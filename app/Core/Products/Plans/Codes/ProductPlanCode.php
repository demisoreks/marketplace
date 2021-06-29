<?php

namespace App\Core\Products\Plans\Codes;

use App\Core\Products\Plans\Codes\Services\CreateProductPlanCode;
use App\Core\Products\Plans\Codes\Services\GetProductPlanCodes;
use App\Core\Products\Plans\Codes\Services\UpdateProductPlanCode;
use App\Core\Services\Delete;

class ProductPlanCode implements IProductPlanCode {

    use GetProductPlanCodes, CreateProductPlanCode, UpdateProductPlanCode, Delete;

}
