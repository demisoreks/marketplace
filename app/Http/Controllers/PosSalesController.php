<?php

namespace App\Http\Controllers;

use App\Core\Resellers\IReseller;
use App\Core\Services\ResellerApi;
use App\Sale;
use App\SalesItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yabacon\Paystack;

class PosSalesController extends Controller
{

    private $_reseller;
    private $reseller_api;

    public function __construct(IReseller $reseller)
    {
        $this->_reseller = $reseller;
        $this->reseller_api = new ResellerApi;
    }

    public function index() {
        $sales = Sale::where('reseller_id', $this->_reseller->getId())->get();
        $customers_ = $this->reseller_api->getCustomers($this->_reseller->getId());
        foreach ($sales as $sale) {
            foreach ($customers_ as $c) {
                if ($sale->customer_id == $c->id) {
                    $sale->company_name = $c->companyName;
                }
            }
        }
        return view('pos.sales.index', compact('sales'));
    }

    public function create() {
        $customers_ = $this->reseller_api->getCustomers($this->_reseller->getId());
        $customers = [];
        foreach ($customers_ as $c) {
            $customers += [$c->id => $c->companyName];
        }
        return view('pos.sales.create', compact('customers'));
    }

    public function store(Request $request) {
        $data = [
            'reseller_id' => $this->_reseller->getId(),
            'customer_id' => $request->customer_id
        ];
        $sale = Sale::create($data);
        return Redirect::route('pos.sales.show', [$sale->slug()]);
    }

    public function new($customer_id) {
        $data = [
            'reseller_id' => $this->_reseller->getId(),
            'customer_id' => $customer_id
        ];
        $sale = Sale::create($data);
        return Redirect::route('pos.sales.show', [$sale->slug()]);
    }

    public function show(Sale $sale) {
        $customer = $this->reseller_api->getCustomer($sale->customer_id);
        $customer->company_name = $customer->companyName;
        $products = $this->reseller_api->getProducts();
        $sales_items = SalesItem::where('sale_id', $sale->id)->get();
        return view('pos.sales.show', compact('sale', 'customer', 'products', 'sales_items'));
    }

    public function currency(Sale $sale, $currency) {
        $sale->update(['currency' => $currency]);
        return Redirect::route('pos.sales.show', [$sale->slug()]);
    }

    public function add(Sale $sale, $product_id) {
        $products = $this->reseller_api->getProducts();
        $product_name = "";
        foreach ($products as $product) {
            if ($product->id == $product_id) {
                $product_name = $product->name;
                break;
            }
        }
        $sales_items = SalesItem::where('sale_id', $sale->id)->where('product', $product_name);
        if ($sales_items->count() > 0) {
            $sales_item = $sales_items->first();
            $quantity = $sales_item->quantity;
            $sales_item->update(['quantity' => ($quantity+1)]);
        } else {
            $products = $this->reseller_api->getProducts();
            $product_name = "";
            $price = 0;
            foreach ($products as $product) {
                if ($product->id == $product_id) {
                    $product_name = $product->name;
                    $price = $product->price;
                    break;
                }
            }
            SalesItem::create([
                'sale_id' => $sale->id,
                'product' => $product_name,
                'unit_price' => $price,
                'quantity' => 1
            ]);
        }
        return Redirect::route('pos.sales.show', [$sale->slug()]);
    }

    public function increase(SalesItem $sales_item) {
        $quantity = $sales_item->quantity;
        $sales_item->update(['quantity' => ($quantity+1)]);
        return Redirect::route('pos.sales.show', [$sales_item->sale->slug()]);
    }

    public function reduce(SalesItem $sales_item) {
        if ($sales_item->quantity > 1) {
            $quantity = $sales_item->quantity;
            $sales_item->update(['quantity' => ($quantity-1)]);
        } else {
            $sales_item->delete();
        }
        return Redirect::route('pos.sales.show', [$sales_item->sale->slug()]);
    }

    public function remove(SalesItem $sales_item) {
        $sales_item->delete();
        return Redirect::route('pos.sales.show', [$sales_item->sale->slug()]);
    }

    public function checkout(Sale $sale, Request $request) {
        $paystack = new Paystack('sk_test_57ae7adc53e833512473c193c40b5c412ef71bb0');
        try {
            $transaction = $paystack->transaction->initialize([
                'amount' => 5000,
                'email' => 'demiladesoremekun@gmail.com',
                'reference' => 'YYYYYYYYY'.$sale->id,
                'callback_url' => $request->root().'/pos/sales'
            ]);
        } catch (Paystack\Exception\ApiException $ex) {
            //ErrorController::log('Payment', 'Payment failed - '.$ex->getMessage().'.', $customer['EmailAddress']);
            //return ['status' => false, 'detail' => $ex->getMessage()];
        }
    }

}
