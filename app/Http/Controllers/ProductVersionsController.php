<?php

namespace App\Http\Controllers;

use App\Core\Products\Versions\IProductVersion;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DProduct;
use App\DProductVersion;
use App\DVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductVersionsController extends Controller
{

    private $_product_version;

    public function __construct(IProductVersion $product_version)
    {
        $this->_product_version = $product_version;
    }

    public function store(DProduct $product, Request $request) {
        $version = DVersion::find($request->version_id);
        $response = $this->_product_version->createProductVersion($product, $version);
        if (isset($response['data'])) {
            Log::info('Product version was added - '.$version->name);

            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product version was added.'));
        } else {
            Log::info('Product version was not added - '.$response['error']);

            return Redirect::route('products.show', $product->slug())
                    ->with('error', Alert::format('Error!', $response['error']));
        }
    }

    public function destroy(DProduct $product, DProductVersion $product_version) {
        $this->_product_version->delete($product_version);
        Log::info('Product version was deleted.');
        return Redirect::route('products.show', $product->slug())
                ->with('success', Alert::format('Completed!', 'Product version was deleted.'));
    }

}
