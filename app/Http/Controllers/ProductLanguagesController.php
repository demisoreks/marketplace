<?php

namespace App\Http\Controllers;

use App\Core\Products\Languages\IProductLanguage;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DLanguage;
use App\DProduct;
use App\DProductLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductLanguagesController extends Controller
{

    private $_product_language;

    public function __construct(IProductLanguage $product_language)
    {
        $this->_product_language = $product_language;
    }

    public function store(DProduct $product, Request $request) {
        $language = DLanguage::find($request->language_id);
        $response = $this->_product_language->createProductLanguage($product, $language);
        if (isset($response['data'])) {
            Log::info('Product language was added - '.$language->name);

            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product language was added.'));
        } else {
            Log::info('Product language was not added - '.$response['error']);

            return Redirect::route('products.show', $product->slug())
                    ->with('error', Alert::format('Error!', $response['error']));
        }
    }

    public function destroy(DProduct $product, DProductLanguage $product_language) {
        $this->_product_language->delete($product_language);
        Log::info('Product language was deleted.');
        return Redirect::route('products.show', $product->slug())
                ->with('success', Alert::format('Completed!', 'Product language was deleted.'));
    }

}
