<?php

namespace App\Core\Products\Plans\Codes\Services;

use App\Core\Services\DbRecord;
use App\DProductPlan;
use App\DProductPlanCode;

trait CreateProductPlanCode {

    public function createProductPlanCode(DProductPlan $product_plan, $data) {
        $response = [];
        $record_check = DbRecord::checkCombined('product_plan_codes', ['product_plan_id' => $product_plan->id, 'billing_interval_id' => $data['billing_interval_id']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $product_plan_code = DProductPlanCode::create([
                'product_plan_id' => $product_plan->id,
                'billing_interval_id' => $data['billing_interval_id'],
                'code' => $data['code']
            ]);
            if ($product_plan_code) {
                $response['data'] = $product_plan_code;
            } else {
                $response['error'] = "Product plan code was not added.";
            }
        }
    }

}
