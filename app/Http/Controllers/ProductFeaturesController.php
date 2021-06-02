<?php

namespace App\Http\Controllers;

use App\Core\Products\Features\IProductFeature;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DProduct;
use App\DProductFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductFeaturesController extends Controller
{

    private $_product_feature;

    public function __construct(IProductFeature $product_feature)
    {
        $this->_product_feature = $product_feature;
    }

    public function store(DProduct $product, Request $request) {
        $data = [
            'feature' => $request->feature,
            'highlight' => $request->highlight
        ];
        $response = $this->_product_feature->createProductFeature($product, $data);
        if (isset($response['data'])) {
            Log::info('Product feature was added - '.$data['feature']);

            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product feature was added.'));
        } else {
            Log::info('Product feature was not added - '.$response['error']);

            return Redirect::route('products.show', $product->slug())
                    ->with('error', Alert::format('Completed!', $response['error']));
        }
    }

    public function destroy(DProduct $product, DProductFeature $product_feature) {
        $this->_product_feature->delete($product_feature);
        Log::info('Product feature was deleted.');
        return Redirect::route('products.show', $product->slug())
                ->with('success', Alert::format('Completed!', 'Product feature was deleted.'));
    }

}
