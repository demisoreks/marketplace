<?php

namespace App\Core\Products\Versions;

use App\Core\Products\Versions\Services\CreateProductVersion;
use App\Core\Products\Versions\Services\GetProductVersions;
use App\Core\Services\Delete;

class ProductVersion implements IProductVersion {

    use GetProductVersions, CreateProductVersion, Delete;

}
