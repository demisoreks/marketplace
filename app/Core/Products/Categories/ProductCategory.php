<?php

namespace App\Core\Products\Categories;

use App\Core\Products\Categories\Services\CreateProductCategory;
use App\Core\Products\Categories\Services\GetProductCategories;
use App\Core\Services\Delete;

class ProductCategory implements IProductCategory {

    use GetProductCategories, CreateProductCategory, Delete;

}
