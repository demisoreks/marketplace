<?php

namespace App\Core\Products\Faqs;

use App\DProduct;
use App\DProductFaq;

interface IProductFaq {

    public function getProductFaqs(DProduct $product);

    public function createProductFaq(DProduct $product, $data);

    public function delete(DProductFaq $product_faq);

}
