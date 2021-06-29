<?php

namespace App\Core\Products\Features;

use App\DProduct;
use App\DProductFeature;

interface IProductFeature {

    public function getProductFeatures(DProduct $product);

    public function createProductFeature(DProduct $product, $data);

    public function updateProductFeature(DProductFeature $product_feature, $data);

    public function delete(DProductFeature $product_feature);

}
