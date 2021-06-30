<?php

namespace App\Core\Services;

use App\Core\Categories\Services\GetCategories;
use App\Core\Products\Plans\Codes\Services\GetProductPlanCodes;
use App\Core\Products\Plans\Services\GetProductPlans;
use App\Core\Products\Services\GetProducts;
use App\DProduct;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class Site {

    use GetCategories, GetProducts, GetProductPlans, GetProductPlanCodes;

    public function getConfiguration() {
        return Configuration::get();
        if (Cache::get('configuration') == null) {
            Cache::put('configuration', Configuration::get(), 3600);
        }
        return Cache::get('configuration');
    }

    public function getSliderProducts() {
        $slider_products = [];
        $products = $this->getProductsByActive(true);
        foreach ($products as $product) {
            if ($product->image_url != null && $product->image_url != "") {
                $slider_products[] = $product;
            }
        }
        return $slider_products;
    }

    public function getFeaturedProducts() {
        $featured_products = $this->getProductsFeatured();
        foreach ($featured_products as $featured_product) {
            $featured_product->starting_price = $this->getProductMinimumPrice($featured_product);
        }
        return $featured_products;
    }

    public function getProductMinimumPrice(DProduct $product) {
        $prices = [];
        $codes = [];
        $back_office = new BackOffice;
        $plans = json_decode($back_office->getProductPlans());
        $product_plans = $this->getProductPlans($product);
        foreach ($product_plans as $product_plan) {
            $product_plan_codes = $this->getProductPlanCodes($product_plan);
            foreach ($product_plan_codes as $product_plan_code) {
                $codes[] = $product_plan_code->code;
            }
        }
        foreach ($plans as $plan) {
            if (in_array($plan->PlanCode, $codes)) {
                $prices[] = $plan->RecurringPrice;
            }
        }
        if (count($prices) == 0) {
            return null;
        } else {
            return min($prices);
        }
    }

}
