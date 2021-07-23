<?php

namespace App\Core\Services;

use App\DProductPlanCode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Cookie;

class Cart {

    private $cart_api_host;
    private $client;
    private $site;

    public function __construct()
    {
        $this->cart_api_host = env('BACKOFFICE_API_HOST');
        $this->client = new Client([
            'base_uri' => $this->cart_api_host,
            'verify' => false,
            'timeout' => 300
        ]);
        $this->site = new Site;
    }

    public function create() {
        try {
            $response = $this->client->get('/Cart');
            $cart = json_decode($response->getBody()->getContents());
            return $cart->Id;
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }
    }

    public function getId() {
        $cart_id = null;
        if (Cookie::has('cart_id')) {
            $cart_id = Cookie::get('cart_id');
        } else {
            $cart_id = $this->create();
        }
        Cookie::queue('cart_id', $cart_id, 86400);
        return $cart_id;
    }

    public function get() {
        try {
            $response = $this->client->get('/Cart\/'.$this->getId());
            $cart = json_decode($response->getBody()->getContents());
            return $cart;
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }
    }

    public function getCount() {
        try {
            $response = $this->client->get('/Cart\/'.$this->getId().'\/Count');
            $count = $response->getBody()->getContents();
            return $count;
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }
    }

    public function addItem(DProductPlanCode $product_plan_code) {
        $item = [];
        $plan = $this->site->getProductPlanDetails($product_plan_code);
        $item['Code'] = $plan->PlanCode;
        $item['PaymentCode'] = "";
        $item['PlanName'] = $plan->PlanName;
        $item['PlanDescription'] = $plan->PlanDescription;
        $item['Quantity'] = $plan->MinimumPurchaseQty;
        $item['MinimumPurchaseQuantity'] = $plan->MinimumPurchaseQty;
        $item['Price'] = $plan->RecurringPrice;
        $item['TotalCost'] = $item['Quantity'] * $item['Price'];
        $item['BillingInterval'] = $plan->BillingInterval;
        $item['IsDomain'] = $plan->IsDomain;
        $item['IsAuotoProvisionable'] = $plan->IsAutoProvisionable;
        $item['DomainName'] = "";
        $item['Provider'] = $plan->Provider;
        $body = json_encode($item);
        try {
            $response = $this->client->post('/Cart\/'.$this->getId(), [
                'body' => $body,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accepts' => 'application/json'
                ]
            ]);
            $cart = json_decode($response->getBody()->getContents());
            return $cart;
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }
    }

    public function reduceItem(DProductPlanCode $product_plan_code) {
        $cart = $this->get();
        $i = null;
        foreach ($cart->Items as $item) {
            if ($item->Code == $product_plan_code->code) {
                $item->Quantity --;
                $i = $item;
                break;
            }
        }
        if ($i->Quantity > 0) {
            $body = json_encode($i);
            try {
                $response = $this->client->put('/Cart\/'.$this->getId(), [
                    'body' => $body,
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accepts' => 'application/json'
                    ]
                ]);
                $new_cart = json_decode($response->getBody()->getContents());
                return $new_cart;
            } catch (ClientException $e) {
                dd($e->getResponse()->getBody()->getContents());
            }
        } else {
            $this->removeItem($product_plan_code);
        }
    }

    public function removeItem(DProductPlanCode $product_plan_code) {
        try {
            $response = $this->client->delete('/Cart\/'.$this->getId().'/'.$product_plan_code->code);
            $r = json_decode($response->getBody()->getContents());
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }
    }

}
