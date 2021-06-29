<?php

namespace App\Core\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Cache;

class ResellerApi {

    private $reseller_api_host;
    private $client;

    public function __construct()
    {
        $this->reseller_api_host = env('RESELLER_API_HOST');
        $this->client = new Client([
            'base_uri' => $this->reseller_api_host,
            'verify' => false,
            'timeout' => 300,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accepts' => 'application/json'
            ]
        ]);
    }

    public function getProductProviders() {
        if (Cache::get('product_providers') == null) {
            try {
                $response = $this->client->request('GET', '/ProductProviders');
                $product_providers = $response->getBody()->getContents();
                Cache::put('product_providers', $product_providers, 3600);
            } catch (ClientException $e) {
                dd($e->getResponse()->getBody()->getContents());
                //return null;
            }
        }

        return Cache::get('product_providers');
    }

    public function createAccount($params) {
        $body = json_encode($params);
        try {
            $response = $this->client->request('POST', '/Account', ['body' => $body]);
            if (in_array($response->getStatusCode(), [200, 201])) {
                $response_body = json_decode($response->getBody()->getContents());
                return $response_body->id;
            } else {
                return null;
            }
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
            //return null;
        }
    }

    public function authenticate($params) {
        $body = json_encode($params);
        try {
            $response = $this->client->request('POST', '/Auth', ['body' => $body]);
            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
            } else {
                return null;
            }
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
            //return null;
        }
    }

    public function getAccount($id) {
        $account = null;
        try {
            $response = $this->client->request('GET', '/Account\/'.$id);
            if ($response->getStatusCode() == 200) {
                $account = json_decode($response->getBody()->getContents());
                return $account;
            } else {
                return null;
            }
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
            //return null;
        }
    }

    public function createCustomer($reseller_id, $params) {
        $body = json_encode($params);
        try {
            $response = $this->client->request('POST', '/Customer\/'.$reseller_id, ['body' => $body]);
            if (in_array($response->getStatusCode(), [200, 201])) {
                $response_body = json_decode($response->getBody()->getContents());
                return $response_body->id;
            } else {
                return null;
            }
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
            //return null;
        }
    }

    public function getCustomers($reseller_id) {
        $customers = [];
        try {
            $response = $this->client->request('GET', '/Customers\/'.$reseller_id);
            if ($response->getStatusCode() == 200) {
                $customers = json_decode($response->getBody()->getContents());
            }
        } catch (ClientException $e) {
            //dd($e->getResponse()->getBody()->getContents());
            //return null;
        }

        return $customers;
    }

    public function getCustomer($customer_id) {
        $customer = null;
        try {
            $response = $this->client->request('GET', '/Customer\/'.$customer_id);
            if ($response->getStatusCode() == 200) {
                $customer = json_decode($response->getBody()->getContents());
            }
        } catch (ClientException $e) {
            //dd($e->getResponse()->getBody()->getContents());
            //return null;
        }

        return $customer;
    }

}
