<?php

namespace App\Http\Controllers;

use App\Core\Services\Cart;
use App\DProductPlanCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{

    private $cart;

    public function __construct()
    {
        $this->cart = new Cart;
    }

    public function index() {
        $cart = $this->cart->get();
        return view('cart', compact('cart'));
    }

    public function add(DProductPlanCode $product_plan_code) {
        $response = $this->cart->addItem($product_plan_code);
        return Redirect::route('cart');
    }

    public function reduce(DProductPlanCode $product_plan_code) {
        $response = $this->cart->reduceItem($product_plan_code);
        return Redirect::route('cart');
    }

    public function remove(DProductPlanCode $product_plan_code) {
        $response = $this->cart->removeItem($product_plan_code);
        return Redirect::route('cart');
    }

}
