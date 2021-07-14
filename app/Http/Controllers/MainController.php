<?php

namespace App\Http\Controllers;

use App\Core\Products\Categories\IProductCategory;
use App\Core\Products\Faqs\IProductFaq;
use App\Core\Products\Features\IProductFeature;
use App\Core\Products\IProduct;
use App\Core\Products\Languages\IProductLanguage;
use App\Core\Products\Requirements\IProductRequirement;
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

    public function __construct(IProduct $product, IProductCategory $product_category, IProductLanguage $product_language, IProductRequirement $product_requirement, IProductFeature $product_feature, IProductFaq $product_faq)
    {
        $this->site = new Site;
        $this->_product = $product;
        $this->_product_category = $product_category;
        $this->_product_language = $product_language;
        $this->_product_requirement = $product_requirement;
        $this->_product_feature = $product_feature;
        $this->_product_faq = $product_faq;
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

}
