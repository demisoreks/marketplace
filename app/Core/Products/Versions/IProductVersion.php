<?php

namespace App\Core\Products\Versions;

use App\DProduct;
use App\DProductVersion;
use App\DVersion;

interface IProductVersion {

    public function getProductVersions(DProduct $product);

    public function createProductVersion(DProduct $product, DVersion $version);

    public function delete(DProductVersion $product_version);

}
