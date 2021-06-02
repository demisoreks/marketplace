<?php

namespace App\Core\Products\Versions\Services;

use App\Core\Services\DbRecord;
use App\DVersion;
use App\DProduct;
use App\DProductVersion;

trait CreateProductVersion {

    public function createProductVersion(DProduct $product, DVersion $version) {
        $response = [];
        $record_check = DbRecord::checkCombined('product_versions', ['product_id' => $product->id, 'version_id' => $version->id]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $product_version = DProductVersion::create([
                'product_id' => $product->id,
                'version_id' => $version->id
            ]);
            if ($product_version) {
                $response['data'] = $product_version;
            } else {
                $response['error'] = "Product version was not added.";
            }
        }
        return $response;
    }

}
