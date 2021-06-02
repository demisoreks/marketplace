<?php

namespace App\Core\Products\Services;

use App\Core\Services\DbRecord;
use App\DProduct;

trait CreateProduct {

    public function createProduct($data) {
        $response = [];
        $record_check = DbRecord::check('products', ['name' => $data['name']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $product = DProduct::create($data);
            if ($product) {
                $response['data'] = $product;
            } else {
                $response['error'] = "Product was not created.";
            }
        }
        return $response;
    }

}
