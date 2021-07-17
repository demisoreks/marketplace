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
use App\Core\Services\BackOffice;
use App\Core\Services\Site;
use App\DCategory;
use App\DProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{

    private $site;
    private $_product;
    private $_product_category;
    private $_product_language;
    private $_product_requirement;
    private $_product_feature;
    private $_product_faq;
    private $_product_version;
    private $_billing_interval;
    private $_product_plan;
    private $_product_plan_code;

    public function __construct(IProduct $product, IProductCategory $product_category, IProductLanguage $product_language, IProductRequirement $product_requirement, IProductFeature $product_feature, IProductFaq $product_faq, IProductVersion $product_version, IBillingInterval $billing_interval, IProductPlan $product_plan, IProductPlanCode $product_plan_code)
    {
        $this->site = new Site;
        $this->_product = $product;
        $this->_product_category = $product_category;
        $this->_product_language = $product_language;
        $this->_product_requirement = $product_requirement;
        $this->_product_feature = $product_feature;
        $this->_product_faq = $product_faq;
        $this->_product_version = $product_version;
        $this->_billing_interval = $billing_interval;
        $this->_product_plan = $product_plan;
        $this->_product_plan_code = $product_plan_code;
    }

    public function index() {
        return view('index');
    }

    public function category(DCategory $category) {
        $products = $this->_product->getProductsByCategory($category);
        foreach ($products as $product) {
            $product->starting_price = $this->site->getProductMinimumPrice($product);
        }
        return view('category', compact('products', 'category'));
    }

    public function product(DProduct $product) {
        $product_categories = $this->_product_category->getProductCategories($product);
        $starting_price = $this->site->getProductMinimumPrice($product);
        $product_languages = $this->_product_language->getProductLanguages($product);
        $product_requirements = $this->_product_requirement->getProductRequirements($product);
        $product_features = $this->_product_feature->getProductFeatures($product);
        $product_faqs = $this->_product_faq->getProductFaqs($product);
        return view('product', compact('product', 'product_categories', 'starting_price', 'product_languages', 'product_requirements', 'product_features', 'product_faqs'));
    }

    public function plans(DProduct $product) {
        $product_categories = $this->_product_category->getProductCategories($product);
        $product_versions = $this->_product_version->getProductVersions($product);
        $plan_details = [];
        foreach ($product_versions as $product_version) {
            $plan_detail = [];
            $plan_detail['version'] = $product_version->version;
            $plan_detail['billing_intervals'] = $this->_billing_interval->getBillingIntervalsByProductAndVersion($product, $product_version->version);
            foreach ($plan_detail['billing_intervals'] as $billing_interval) {
                $billing_interval['plan_codes'] = $this->_product_plan_code->getProductPlanCodesByBillingIntervalAndProductAndVersion($billing_interval, $product, $product_version->version);
                foreach ($billing_interval['plan_codes'] as $plan_code) {
                    $plan_code->price = $this->site->getProductPlanPrice($plan_code);
                }
            }
            array_push($plan_details, $plan_detail);
        }
        $product_features = $this->_product_feature->getProductFeatures($product);

        return view('plans', compact('product', 'product_categories', 'plan_details', 'product_features'));
    }

}
