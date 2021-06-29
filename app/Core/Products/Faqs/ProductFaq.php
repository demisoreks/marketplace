<?php

namespace App\Core\Products\Faqs;

use App\Core\Products\Faqs\Services\CreateProductFaq;
use App\Core\Products\Faqs\Services\GetProductFaqs;
use App\Core\Services\Delete;

class ProductFaq implements IProductFaq {

    use GetProductFaqs, CreateProductFaq, Delete;

}
