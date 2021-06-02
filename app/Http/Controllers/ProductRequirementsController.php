<?php

namespace App\Http\Controllers;

use App\Core\Products\Requirements\IProductRequirement;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DProduct;
use App\DProductRequirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductRequirementsController extends Controller
{

    private $_product_requirement;

    public function __construct(IProductRequirement $product_requirement)
    {
        $this->_product_requirement = $product_requirement;
    }

    public function store(DProduct $product, Request $request) {
        $data = [
            'requirement' => $request->requirement
        ];
        $response = $this->_product_requirement->createProductRequirement($product, $data);
        if (isset($response['data'])) {
            Log::info('Product requirement was added - '.$data['requirement']);

            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product requirement was added.'));
        } else {
            Log::info('Product requirement was not added - '.$response['error']);

            return Redirect::route('products.show', $product->slug())
                    ->with('error', Alert::format('Completed!', $response['error']));
        }
    }

    public function destroy(DProduct $product, DProductRequirement $product_requirement) {
        $this->_product_requirement->delete($product_requirement);
        Log::info('Product requirement was deleted.');
        return Redirect::route('products.show', $product->slug())
                ->with('success', Alert::format('Completed!', 'Product requirement was deleted.'));
    }

}
