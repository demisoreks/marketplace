<?php

namespace App\Core\Products\Plans\Services;

use App\Core\Services\DbRecord;
use App\DProduct;
use App\DProductPlan;

trait CreateProductPlan {

    public function createProductPlan(DProduct $product, $data) {
        $response = [];
        $record_check = DbRecord::checkCombined('product_plans', ['product_id' => $product->id, 'name' => $data['name']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $product_plan = DProductPlan::create([
                'product_id' => $product->id,
                'name' => $data['name'],
                'version_id' => $data['version_id'],
                'features' => $data['features']
            ]);
            if ($product_plan) {
                $response['data'] = $product_plan;
            } else {
                $response['error'] = "Product plan was not added.";
            }
        }
        return $response;
    }

}
