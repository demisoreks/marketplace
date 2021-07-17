<?php

namespace App\Core\BillingIntervals\Services;

use App\DBillingInterval;
use App\DProduct;
use App\DProductPlan;
use App\DProductPlanCode;
use App\DVersion;

trait GetBillingIntervals {

    public function getBillingIntervals() {
        $billing_intervals = DBillingInterval::all();
        return $billing_intervals;
    }

    public function getBillingIntervalsByActive($active) {
        $billing_intervals  = DBillingInterval::where('active', $active)->orderBy('months')->get();
        return $billing_intervals;
    }

    public function getBillingIntervalsByProductAndVersion(DProduct $product, DVersion $version) {
        $billing_intervals  = DBillingInterval::whereIn('id', DProductPlanCode::whereIn('product_plan_id', DProductPlan::where('product_id', $product->id)->where('version_id', $version->id)->pluck('id')->toArray())->pluck('billing_interval_id')->toArray())->orderBy('months')->get();
        return $billing_intervals;
    }

}
