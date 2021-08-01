<?php

namespace App\Core\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Yabacon\Paystack;

class Payment {

    /*public static function pay($amount, $email, $reference, $callback) {
        $paystack = new Paystack('sk_test_57ae7adc53e833512473c193c40b5c412ef71bb0');
        try {
            $transaction = $paystack->transaction->initialize([
                'amount' => $amount,
                'email' => $email,
                'reference' => $reference,
                'callback_url' => '/'.$callback
            ]);
        } catch (Paystack\Exception\ApiException $ex) {
            return ['status' => false, 'detail' => $ex->getMessage()];
        }

        return ['status' => true, 'detail' => $transaction->data->authorization_url];
    }*/

    public function pay($amount, $reference, $callback, Request $request) {
        $paystack = new Paystack(env('PAYSTACK_SECRET_KEY'));
        try {
            $transaction = $paystack->transaction->initialize([
                'amount' => round($amount * 100),
                'email' => Cookie::get('icommerce_customer_email'),
                'reference' => $reference,
                'subaccount' => env('PAYSTACK_SUBACCOUNT'),
                'callback_url' => $request->root().'/'.$callback
            ]);
        } catch (Paystack\Exception\ApiException $ex) {
            return ['status' => false, 'detail' => $ex->getMessage()];
        }

        Cookie::queue('paymentRef', $reference, 1500);

        return ['status' => true, 'detail' => $transaction->data->authorization_url];
    }

    public function verifyTransaction($reference) {
        $client = new Client([
            'base_uri' => 'https://api.paystack.co',
        ]);
        try {
            $response = $client->get('/transaction/verify/'.$reference, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer '.env('PAYSTACK_SECRET_KEY')
                ]
            ]);
            $data = json_decode($response->getBody()->getContents());
            return $data;
        } catch (ClientException $e) {
            dd($e->getResponse()->getBody()->getContents());
        }
    }

}
