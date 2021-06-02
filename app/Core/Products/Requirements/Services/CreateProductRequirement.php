<?php

namespace App\Core\Products\Requirements\Services;

use App\Core\Services\DbRecord;
use App\DProduct;
use App\DProductRequirement;

trait CreateProductRequirement {

    public function createProductRequirement(DProduct $product, $data) {
        $response = [];
        $record_check = DbRecord::checkCombined('product_requirements', ['product_id' => $product->id, 'requirement' => $data['requirement']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $product_requirement = DProductRequirement::create([
                'product_id' => $product->id,
                'requirement' => $data['requirement']
            ]);
            if ($product_requirement) {
                $response['data'] = $product_requirement;
            } else {
                $response['error'] = "Product requirement was not added.";
            }
        }
        return $response;
    }

}
