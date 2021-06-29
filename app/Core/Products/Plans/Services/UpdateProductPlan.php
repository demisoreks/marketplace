<?php

namespace App\Core\Products\Plans\Services;

use App\Core\Services\DbRecord;
use App\DProductPlan;

trait UpdateProductPlan {

    public function updateProductPlan(DProductPlan $product_plan, $data) {
        $response = [];
        $record_check = DbRecord::checkCombinedExcept('product_plans', ['product_id' => $product_plan->product->id, 'name' => $data['name']], 'id', $product_plan->id);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            if ($product_plan->update($data)) {
                $response['data'] = $product_plan;
            } else {
                $response['error'] = "Product plan was not updated.";
            }
        }
        return $response;
    }

}
