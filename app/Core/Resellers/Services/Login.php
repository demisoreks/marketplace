<?php

namespace App\Core\Resellers\Services;

use App\Core\Services\ResellerApi;
use Illuminate\Support\Facades\Cookie;

trait Login {

    public function login($id) {
        $reseller_api = new ResellerApi;
        $account = $reseller_api->getAccount($id);
        $name = "Reseller Account";
        if ($account != null) {
            $name = $account->companyName;
        }
        Cookie::queue('icommerce_reseller', $id, 60);
        Cookie::queue('icommerce_reseller_name', $name, 60);
    }

}
