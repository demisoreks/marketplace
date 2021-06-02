<?php

namespace App\Core\Products\Languages;

use App\Core\Products\Languages\Services\CreateProductLanguage;
use App\Core\Products\Languages\Services\GetProductLanguages;
use App\Core\Services\Delete;

class ProductLanguage implements IProductLanguage {

    use GetProductLanguages, CreateProductLanguage, Delete;

}
