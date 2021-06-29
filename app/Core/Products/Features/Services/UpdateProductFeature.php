<?php

namespace App\Core\Products\Features\Services;

use App\Core\Services\DbRecord;
use App\DProductFeature;

trait UpdateProductFeature {

    public function updateProductFeature(DProductFeature $product_feature, $data) {
        $response = [];
        $record_check = DbRecord::checkCombinedExcept('product_features', ['product_id' => $product_feature->product->id, 'feature' => $data['feature']], 'id', $product_feature->id);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            if ($product_feature->update([
                'feature' => $data['feature'],
                'highlight' => $data['highlight']
            ])) {
                $response['data'] = $product_feature;
            } else {
                $response['error'] = "Product feature was not updated.";
            }
        }
        return $response;
    }

}
