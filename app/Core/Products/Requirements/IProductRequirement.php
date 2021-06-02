<?php

namespace App\Core\Products\Requirements;

use App\DProduct;
use App\DProductRequirement;

interface IProductRequirement {

    public function getProductRequirements(DProduct $product);

    public function createProductRequirement(DProduct $product, $data);

    public function delete(DProductRequirement $product_requirement);

}
