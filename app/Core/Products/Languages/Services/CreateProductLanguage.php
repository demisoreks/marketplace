<?php

namespace App\Core\Products\Languages\Services;

use App\Core\Services\DbRecord;
use App\DLanguage;
use App\DProduct;
use App\DProductLanguage;

trait CreateProductLanguage {

    public function createProductLanguage(DProduct $product, DLanguage $language) {
        $response = [];
        $record_check = DbRecord::checkCombined('product_languages', ['product_id' => $product->id, 'language_id' => $language->id]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $product_language = DProductLanguage::create([
                'product_id' => $product->id,
                'language_id' => $language->id
            ]);
            if ($product_language) {
                $response['data'] = $product_language;
            } else {
                $response['error'] = "Product language was not added.";
            }
        }
        return $response;
    }

}
