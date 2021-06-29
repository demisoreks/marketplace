<?php

namespace App\Core\Products\Faqs\Services;

use App\Core\Services\DbRecord;
use App\DProduct;
use App\DProductFaq;

trait CreateProductFaq {

    public function createProductFaq(DProduct $product, $data) {
        $response = [];
        $record_check = DbRecord::checkCombined('product_faqs', ['product_id' => $product->id, 'question' => $data['question']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $product_faq = DProductFaq::create([
                'product_id' => $product->id,
                'question' => $data['question'],
                'answer' => $data['answer']
            ]);
            if ($product_faq) {
                $response['data'] = $product_faq;
            } else {
                $response['error'] = "Product faq was not added.";
            }
        }
        return $response;
    }

}
