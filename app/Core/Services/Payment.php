<?php

namespace App\Core\Services;

use Illuminate\Support\Facades\Request;
use Yabacon\Paystack;

class Payment {

    public static function pay($amount, $email, $reference, $callback) {
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
    }

}
