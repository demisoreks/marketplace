<?php

namespace App\Core\Products\Categories\Services;

use App\DProduct;
use App\DProductCategory;

trait GetProductCategories {

    public function getProductCategories(DProduct $product) {
        $product_categories = DProductCategory::where('product_id', $product->id)->get();
        return $product_categories;
    }

}
