<?php

namespace App\Core\Products\Categories;

use App\DCategory;
use App\DProduct;
use App\DProductCategory;

interface IProductCategory {

    public function getProductCategories(DProduct $product);

    public function createProductCategory(DProduct $product, DCategory $category);

    public function delete(DProductCategory $product_category);

}
