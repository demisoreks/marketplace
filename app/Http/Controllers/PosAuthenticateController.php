<?php

namespace App\Http\Controllers;

use App\Core\Resellers\IReseller;
use App\Core\Services\Alert;
use App\Core\Services\ResellerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PosAuthenticateController extends Controller
{

    private $reseller_api;
    private $_reseller;

    public function __construct(IReseller $reseller)
    {
        $this->reseller_api = new ResellerApi;
        $this->_reseller = $reseller;
    }

    public function authenticate(Request $request) {
        $params = [
            'emailAddress' => $request->email,
            'password' => $request->password
        ];
        $response = $this->reseller_api->authenticate($params);
        if ($response == null) {
            return Redirect::back()
                    ->with('error', Alert::format('Error!', 'Invalid email or password.'));
        } else {
            $this->_reseller->login($response);
            return Redirect::route('pos_dashboard');
        }
    }

    public function logout() {
        return Redirect::route('pos_index')
                ->with('success', Alert::format('Completed!', 'You have successfully logged out.'));
    }

}
