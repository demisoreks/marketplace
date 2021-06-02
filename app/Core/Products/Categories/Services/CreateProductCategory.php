<?php

namespace App\Core\Products\Categories\Services;

use App\Core\Services\DbRecord;
use App\DCategory;
use App\DProduct;
use App\DProductCategory;

trait CreateProductCategory {

    public function createProductCategory(DProduct $product, DCategory $category) {
        $response = [];
        $record_check = DbRecord::checkCombined('product_categories', ['product_id' => $product->id, 'category_id' => $category->id]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $product_category = DProductCategory::create([
                'product_id' => $product->id,
                'category_id' => $category->id
            ]);
            if ($product_category) {
                $response['data'] = $product_category;
            } else {
                $response['error'] = "Product category was not added.";
            }
        }
        return $response;
    }

}
