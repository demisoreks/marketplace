<?php

namespace App\Core\Products\Plans\Codes;

use App\DBillingInterval;
use App\DProduct;
use App\DProductPlan;
use App\DProductPlanCode;
use App\DVersion;

interface IProductPlanCode {

    public function getProductPlanCodes(DProductPlan $product_plan);

    public function getProductPlanCodesByBillingInterval(DProductPlan $product_plan, DBillingInterval $billing_interval);

    public function getProductPlanCodesByBillingIntervalAndProductAndVersion(DBillingInterval $billing_interval, DProduct $product, DVersion $version);

    public function createProductPlanCode(DProductPlan $product_plan, $data);

    public function updateProductPlanCode(DProductPlanCode $product_plan_code, $data);

    public function delete(DProductPlanCode $product_plan_code);

}
