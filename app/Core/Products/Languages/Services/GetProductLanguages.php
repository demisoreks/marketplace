<?php

namespace App\Core\Products\Languages\Services;

use App\DProduct;
use App\DProductLanguage;

trait GetProductLanguages {

    public function getProductLanguages(DProduct $product) {
        $product_languages = DProductLanguage::where('product_id', $product->id)->get();
        return $product_languages;
    }

}
