<?php

namespace App\Http\Controllers;

use App\Core\Products\Categories\IProductCategory;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DCategory;
use App\DProduct;
use App\DProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductCategoriesController extends Controller
{

    private $_product_category;

    public function __construct(IProductCategory $product_category)
    {
        $this->_product_category = $product_category;
    }

    public function store(DProduct $product, Request $request) {
        $category = DCategory::find($request->category_id);
        $response = $this->_product_category->createProductCategory($product, $category);
        if (isset($response['data'])) {
            Log::info('Product category was added - '.$category->name);

            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product category was added.'));
        } else {
            Log::info('Product category was not added - '.$response['error']);

            return Redirect::route('products.show', $product->slug())
                    ->with('error', Alert::format('Error!', $response['error']));
        }
    }

    public function destroy(DProduct $product, DProductCategory $product_category) {
        $this->_product_category->delete($product_category);
        Log::info('Product category was deleted.');
        return Redirect::route('products.show', $product->slug())
                ->with('success', Alert::format('Completed!', 'Product category was deleted.'));
    }

}
