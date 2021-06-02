<?php

namespace App\Core\Products\Features\Services;

use App\Core\Services\DbRecord;
use App\DProduct;
use App\DProductFeature;

trait CreateProductFeature {

    public function createProductFeature(DProduct $product, $data) {
        $response = [];
        $record_check = DbRecord::checkCombined('product_features', ['product_id' => $product->id, 'feature' => $data['feature']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $product_feature = DProductFeature::create([
                'product_id' => $product->id,
                'feature' => $data['feature'],
                'highlight' => $data['highlight']
            ]);
            if ($product_feature) {
                $response['data'] = $product_feature;
            } else {
                $response['error'] = "Product feature was not added.";
            }
        }
        return $response;
    }

}
