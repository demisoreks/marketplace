<?php

namespace App\Core\Products;

use App\DCategory;
use App\DProduct;

interface IProduct {

    public function getProducts();

    public function getProductsByActive($active);

    public function getProductsByCategory(DCategory $category);

    public function createProduct($data);

    public function updateProduct(DProduct $product, $data);

    public function disable(DProduct $product);

    public function enable(DProduct $product);

}

