<?php

namespace App\Core\Products\Languages;

use App\DLanguage;
use App\DProduct;
use App\DProductLanguage;

interface IProductLanguage {

    public function getProductLanguages(DProduct $product);

    public function createProductLanguage(DProduct $product, DLanguage $language);

    public function delete(DProductLanguage $product_language);

}
