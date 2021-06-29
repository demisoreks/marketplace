<?php

namespace App\Core\Products\Plans\Codes\Services;

use App\Core\Services\DbRecord;
use App\DProductPlanCode;

trait UpdateProductPlanCode {

    public function updateProductPlanCode(DProductPlanCode $product_plan_code, $data) {
        $response = [];
        $record_check = DbRecord::checkCombinedExcept('product_plan_codes', ['product_plan_id' => $product_plan_code->productPlan->id, 'code' => $data['code']], 'id', $product_plan_code->id);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            if ($product_plan_code->update($data)) {
                $response['data'] = $product_plan_code;
            } else {
                $response['error'] = "Product plan code was not updated.";
            }
        }
    }

}
