<?php

namespace App\Http\Controllers;

use App\Core\Products\IProduct;
use App\Core\Services\BackOffice;
use App\Core\Services\Site;
use App\DCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{

    private $site;
    private $_product;

    public function __construct(IProduct $product)
    {
        $this->site = new Site;
        $this->_product = $product;
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

}
