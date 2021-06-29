<?php

namespace App\Http\Controllers;

use App\Core\BillingIntervals\IBillingInterval;
use App\Core\Products\Categories\IProductCategory;
use App\Core\Products\Faqs\IProductFaq;
use App\Core\Products\Features\IProductFeature;
use App\Core\Products\IProduct;
use App\Core\Products\Languages\IProductLanguage;
use App\Core\Products\Plans\Codes\IProductPlanCode;
use App\Core\Products\Plans\IProductPlan;
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
    private $_product_plan;
    private $_product_plan_code;
    private $_billing_interval;
    private $_product_faq;

    public function __construct(IProduct $product, IProductCategory $product_category, IProductRequirement $product_requirement, IProductFeature $product_feature, IProductLanguage $product_language, IProductVersion $product_version, IProductPlan $product_plan, IProductPlanCode $product_plan_code, IBillingInterval $billing_interval, IProductFaq $product_faq)
    {
        $this->_product = $product;
        $this->_product_category = $product_category;
        $this->_product_requirement = $product_requirement;
        $this->_product_feature = $product_feature;
        $this->_product_language = $product_language;
        $this->_product_version = $product_version;
        $this->_product_plan = $product_plan;
        $this->_product_plan_code = $product_plan_code;
        $this->_billing_interval = $billing_interval;
        $this->_product_faq = $product_faq;
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
        $product_plans = $this->_product_plan->getProductPlans($product);
        foreach ($product_plans as $product_plan) {
            $product_plan->product_plan_codes = $this->_product_plan_code->getProductPlanCodes($product_plan);
        }
        $billing_intervals = $this->_billing_interval->getBillingIntervalsByActive(true);
        $product_faqs = $this->_product_faq->getProductFaqs($product);
        return view('admin.products.show', compact('product', 'product_categories', 'product_requirements', 'product_features', 'product_languages', 'product_versions', 'product_plans', 'billing_intervals', 'product_faqs'));
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
