<?php

namespace App\Core\Products\Services;

use App\DCategory;
use App\DProduct;

trait GetProducts {

    public function getProducts() {
        $products = DProduct::all();
        return $products;
    }

    public function getProductsByActive($active) {
        $products = DProduct::where('active', $active)->get();
        return $products;
    }

    public function getProductsFeatured() {
        $products = DProduct::where('active', true)->where('featured', true)->get();
        return $products;
    }

    public function getProductsByCategory(DCategory $category) {
        $products = DProduct::where('active', true)->where('category_id', $category->id)->get();
        return $products;
    }

}
