<?php

namespace App\Core\Products\Requirements;

use App\Core\Products\Requirements\Services\CreateProductRequirement;
use App\Core\Products\Requirements\Services\GetProductRequirements;
use App\Core\Services\Delete;

class ProductRequirement implements IProductRequirement {

    use GetProductRequirements, CreateProductRequirement, Delete;

}
