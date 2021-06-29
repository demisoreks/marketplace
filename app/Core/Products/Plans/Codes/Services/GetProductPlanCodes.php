<?php

namespace App\Core\Products\Plans\Codes\Services;

use App\DBillingInterval;
use App\DProductPlan;
use App\DProductPlanCode;

trait GetProductPlanCodes {

    public function getProductPlanCodes(DProductPlan $product_plan) {
        $product_plan_codes = DProductPlanCode::where('product_plan_id', $product_plan->id)->get();
        return $product_plan_codes;
    }

    public function getProductPlanCodesByBillingInterval(DProductPlan $product_plan, DBillingInterval $billing_interval) {
        $product_plan_codes = DProductPlanCode::where('product_plan_id', $product_plan->id)->where('billing_interval_id', $billing_interval->id)->get();
        return $product_plan_codes;
    }

}
