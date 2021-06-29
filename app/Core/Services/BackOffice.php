<?php

namespace App\Core\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Cache;

class BackOffice {

    private $backoffice_api_host;
    private $client;

    public function __construct()
    {
        $this->backoffice_api_host = env('BACKOFFICE_API_HOST');
        $this->client = new Client([
            'base_uri' => $this->backoffice_api_host,
            'verify' => false,
            'timeout' => 300
        ]);
    }

    public function getProductPlans() {
        if (Cache::get('product_plans') == null) {
            ini_set('max_execution_time', 600);

            try {
                $response = $this->client->get('/Plans');
                $product_plans = $response->getBody()->getContents();
                Cache::put('product_plans', $product_plans, 3600);
            } catch (ClientException $e) {
                dd($e->getResponse()->getBody()->getContents());
            }
        }

        return Cache::get('product_plans');
    }

}
