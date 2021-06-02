<?php

namespace App\Core\Products;

use App\Core\Products\Services\CreateProduct;
use App\Core\Products\Services\GetProducts;
use App\Core\Products\Services\UpdateProduct;
use App\Core\Services\Disable;
use App\Core\Services\Enable;

class Product implements IProduct {

    use GetProducts, CreateProduct, UpdateProduct, Disable, Enable;

}
