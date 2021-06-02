<?php

namespace App\Core\Products\Services;

use App\Core\Services\DbRecord;
use App\DProduct;

trait UpdateProduct {

    public function updateProduct(DProduct $product, $data) {
        $response = [];
        $record_check = DbRecord::checkExcept('products', ['name' => $data['name']], 'id', $product->id);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            if ($product->update($data)) {
                $response['data'] = $product;
            } else {
                $response['error'] = "Product was not updated.";
            }
        }
        return $response;
    }

}
