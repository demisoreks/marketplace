<?php

namespace App\Http\Controllers;

use App\Core\Products\Categories\IProductCategory;
use App\Core\Products\Features\IProductFeature;
use App\Core\Products\IProduct;
use App\Core\Products\Languages\IProductLanguage;
use App\Core\Products\Requirements\IProductRequirement;
use App\Core\Products\Versions\IProductVersion;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{

    private $_product;
    private $_product_category;
    private $_product_requirement;
    private $_product_feature;
    private $_product_language;
    private $_product_version;

    public function __construct(IProduct $product, IProductCategory $product_category, IProductRequirement $product_requirement, IProductFeature $product_feature, IProductLanguage $product_language, IProductVersion $product_version)
    {
        $this->_product = $product;
        $this->_product_category = $product_category;
        $this->_product_requirement = $product_requirement;
        $this->_product_feature = $product_feature;
        $this->_product_language = $product_language;
        $this->_product_version = $product_version;
    }

    public function index() {
        $active_products = $this->_product->getProductsByActive(true);
        $disabled_products = $this->_product->getProductsByActive(false);
        return view('admin.products.index', compact('active_products', 'disabled_products'));
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(Request $request) {
        $data = [
            'name' => $request->name,
            'summary' => $request->summary,
            'details' => $request->details,
            'logo_url' => $request->logo_url,
            'image_url' => $request->image_url,
            'vendor_id' => $request->vendor_id,
            'featured' => $request->featured
        ];
        $response = $this->_product->createProduct($data);
        if (isset($response['data'])) {
            Log::info('Product was created - '.$request->name);

            $product = $response['data'];
            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product was created.'));
        } else {
            Log::info('Product was not created - '.$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function show(DProduct $product) {
        $product_categories = $this->_product_category->getProductCategories($product);
        $product_requirements = $this->_product_requirement->getProductRequirements($product);
        $product_features = $this->_product_feature->getProductFeatures($product);
        $product_languages = $this->_product_language->getProductLanguages($product);
        $product_versions = $this->_product_version->getProductVersions($product);
        return view('admin.products.show', compact('product', 'product_categories', 'product_requirements', 'product_features', 'product_languages', 'product_versions'));
    }

    public function edit(DProduct $product) {
        return view('admin.products.edit', compact('product'));
    }

    public function update(DProduct $product, Request $request) {
        $data = [
            'name' => $request->name,
            'summary' => $request->summary,
            'details' => $request->details,
            'logo_url' => $request->logo_url,
            'image_url' => $request->image_url,
            'vendor_id' => $request->vendor_id,
            'featured' => $request->featured
        ];
        $response = $this->_product->updateProduct($product, $data);
        if (isset($response['data'])) {
            Log::info('Product was updated - '.$request->name);

            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product was updated.'));
        } else {
            Log::info('Language was not updated - '.$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function disable(DProduct $product) {
        $this->_product->disable($product);
        Log::info('Product was disabled - '.$product->name);

        return Redirect::route('products.index')
                ->with('success', Alert::format('Completed!', 'Product was disabled.'));
    }

    public function enable(DProduct $product) {
        $this->_product->enable($product);
        Log::info('Product was enabled - '.$product->name);

        return Redirect::route('products.index')
                ->with('success', Alert::format('Completed!', 'Product was abled.'));
    }

}
