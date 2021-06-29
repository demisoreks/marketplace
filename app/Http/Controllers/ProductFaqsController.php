<?php

namespace App\Http\Controllers;

use App\Core\Products\Faqs\IProductFaq;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DProduct;
use App\DProductFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductFaqsController extends Controller
{

    private $_product_faq;

    public function __construct(IProductFaq $product_faq)
    {
        $this->_product_faq = $product_faq;
    }

    public function store(DProduct $product, Request $request) {
        $data = [
            'question' => $request->question,
            'answer' => $request->answer
        ];
        $response = $this->_product_faq->createProductFaq($product, $data);
        if (isset($response['data'])) {
            Log::info('Product FAQ was added - '.$data['question']);

            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product FAQ was added.'));
        } else {
            Log::info('Product FAQ was not added - '.$response['error']);

            return Redirect::route('products.show', $product->slug())
                    ->with('error', Alert::format('Error!', $response['error']));
        }
    }

    public function destroy(DProduct $product, DProductFaq $product_faq) {
        $this->_product_faq->delete($product_faq);
        Log::info('Product FAQ was deleted.');
        return Redirect::route('products.show', $product->slug())
                ->with('success', Alert::format('Completed!', 'Product FAQ was deleted.'));
    }

}
