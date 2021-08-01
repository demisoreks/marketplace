<?php

namespace App\Http\Controllers;

use App\Core\Services\Alert;
use App\Core\Services\Cart;
use App\Core\Services\Payment;
use App\DProductPlanCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{

    private $cart;
    private $payment;

    public function __construct()
    {
        $this->cart = new Cart;
        $this->payment = new Payment;
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

    public function checkout(Request $request) {
        $amount = $request->amount;
        $reference = str_shuffle($this->cart->getId()).date('YmdHis');
        $payment = $this->payment->pay($amount, $reference, "paymentCallback", $request);
        if ($payment['status']) {
            return Redirect::to($payment['detail']);
        } else {
            return Redirect::back()
                    ->with('error', Alert::format('Payment error!', 'We could not process your payment. Please try again.'));
        }
    }

    public function paymentCallback(Request $request) {
        $data = $this->payment->verifyTransaction($request->reference);
        if ($data->status) {
            $order_placed = $this->cart->placeOrder($data->data->amount/100);
            Cookie::queue(Cookie::forget('cart_id'));
            if ($order_placed) {
                return Redirect::route('customer.profile')
                        ->with('success', Alert::format('Congratulations!', 'Your order was placed successfully.'));
            } else {
                return Redirect::route('customer.profile')
                        ->with('error', Alert::format('Error while placing order!', 'Please contact our support team for assistance.'));
            }
        } else {
            return Redirect::route('cart')
                    ->with('error', Alert::format('Payment error!', 'We could not process your payment. Please try again.'));
        }
    }

}
