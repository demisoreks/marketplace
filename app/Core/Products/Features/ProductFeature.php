<?php

namespace App\Core\Products\Features;

use App\Core\Products\Features\Services\CreateProductFeature;
use App\Core\Products\Features\Services\GetProductFeatures;
use App\Core\Services\Delete;

class ProductFeature implements IProductFeature {

    use GetProductFeatures, CreateProductFeature, Delete;

}
