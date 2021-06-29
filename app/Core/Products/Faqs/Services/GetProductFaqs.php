<?php

namespace App\Core\Products\Faqs\Services;

use App\DProduct;
use App\DProductFaq;

trait GetProductFaqs {

    public function getProductFaqs(DProduct $product) {
        $product_faqs = DProductFaq::where('product_id', $product->id)->get();
        return $product_faqs;
    }

}
