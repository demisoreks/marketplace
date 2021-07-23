<?php

namespace App\Core\Products\Plans\Codes\Services;

use App\DBillingInterval;
use App\DProduct;
use App\DProductPlan;
use App\DProductPlanCode;
use App\DVersion;

trait GetProductPlanCodes {

    public function getProductPlanCodes(DProductPlan $product_plan) {
        $product_plan_codes = DProductPlanCode::where('product_plan_id', $product_plan->id)->get();
        return $product_plan_codes;
    }

    public function getProductPlanCodesByBillingInterval(DProductPlan $product_plan, DBillingInterval $billing_interval) {
        $product_plan_codes = DProductPlanCode::where('product_plan_id', $product_plan->id)->where('billing_interval_id', $billing_interval->id)->get();
        return $product_plan_codes;
    }

    public function getProductPlanCodesByBillingIntervalAndProductAndVersion(DBillingInterval $billing_interval, DProduct $product, DVersion $version) {
        $product_plan_codes = DProductPlanCode::where('billing_interval_id', $billing_interval->id)->whereIn('product_plan_id', DProductPlan::where('product_id', $product->id)->where('version_id', $version->id)->pluck('id')->toArray())->get();
        return $product_plan_codes;
    }

    public function getProductPlanCodeByCode($code) {
        $product_plan_code = DProductPlanCode::where('code', $code)->first();
        return $product_plan_code;
    }

}
