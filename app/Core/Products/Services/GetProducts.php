<?php

namespace App\Core\Products\Services;

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

}
