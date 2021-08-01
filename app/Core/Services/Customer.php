<?php

namespace App\Core\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Cookie;

class Customer {

    private $customer_api_host;
    private $client;

    public function __construct()
    {
        $this->customer_api_host = env('BACKOFFICE_API_HOST');
        $this->client = new Client([
            'base_uri' => $this->customer_api_host,
            'verify' => false,
            'timeout' => 300
        ]);
    }

    public function emailExists($email) {
        try {
            $response = $this->client->post('/Customer\/Email\/Exists', [
                'query' => [
                    'emailAddress' => $email
                ]
            ]);
            $resp = json_decode($response->getBody()->getContents());
            if ($resp->ResponseCode == 0) {
                return $resp->ResponseDetail;
            }
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }

        return null;
    }

    public function companyExists($company_name) {
        try {
            $response = $this->client->post('/Customer\/Exists\/'.$company_name);
            $resp = json_decode($response->getBody()->getContents());
            if ($resp->ResponseCode == 0) {
                return $resp->ResponseDetail;
            }
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }

        return null;
    }

    public function create($params) {
        $body = json_encode($params);
        try {
            $response = $this->client->post('/Customer', [
                'body' => $body,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accepts' => 'application/json'
                ]
            ]);
            $resp = json_decode($response->getBody()->getContents());
            if ($resp->ResponseCode == 0) {
                return $resp->ResponseDetail;
            }
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }

        return null;
    }

    public function get($id) {
        try {
            $response = $this->client->get('/Customer\/'.$id);
            $resp = json_decode($response->getBody()->getContents());
            return $resp;
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }
    }

    public function authenticate($params) {
        $body = json_encode($params);
        try {
            $response = $this->client->post('/Account', [
                'body' => $body,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accepts' => 'application/json'
                ]
            ]);
            $resp = json_decode($response->getBody()->getContents());
            if ($resp->ResponseCode == 0) {
                return $resp->ResponseDetail->CrmContactId;
            }
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }

        return null;
    }

    public function login($customer) {
        Cookie::queue('icommerce_customer', $customer->Id, 60);
        Cookie::queue('icommerce_customer_sub', $customer->SubscriptionAccountId, 60);
        Cookie::queue('icommerce_customer_crm', $customer->CrmAccountId, 60);
        Cookie::queue('icommerce_customer_first_name', $customer->FirstName, 60);
        Cookie::queue('icommerce_customer_last_name', $customer->LastName, 60);
        Cookie::queue('icommerce_customer_company_name', $customer->CompanyName, 60);
        Cookie::queue('icommerce_customer_email', $customer->EmailAddress, 60);
        Cookie::queue('icommerce_customer_phone', $customer->PhoneNumber, 60);
    }

    public function logout() {
        Cookie::queue(Cookie::forget('icommerce_customer'));
        Cookie::queue(Cookie::forget('icommerce_customer_sub'));
        Cookie::queue(Cookie::forget('icommerce_customer_crm'));
        Cookie::queue(Cookie::forget('icommerce_customer_first_name'));
        Cookie::queue(Cookie::forget('icommerce_customer_last_name'));
        Cookie::queue(Cookie::forget('icommerce_customer_company_name'));
        Cookie::queue(Cookie::forget('icommerce_customer_email'));
        Cookie::queue(Cookie::forget('icommerce_customer_phone'));
    }

}
