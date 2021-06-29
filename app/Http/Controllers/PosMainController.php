<?php

namespace App\Http\Controllers;

use App\Core\Services\Alert;
use App\Core\Services\Reseller;
use App\Core\Services\ResellerApi;
use App\Core\Vendors\IVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class PosMainController extends Controller
{

    private $reseller_api;

    public function __construct()
    {
        $this->reseller_api = new ResellerApi;
    }

    public function index() {
        if (Cookie::get('icommerce_pos')) {
            return Redirect::route('pos_dashboard');
        }

        return view('pos.index');
    }

    public function dashboard() {
        return view('pos.dashboard');
    }

    public function register() {
        $reseller_api = new ResellerApi;
        $product_providers = json_decode($this->reseller_api->getProductProviders());
        return view('pos.register', compact('product_providers'));
    }

    public function create_account(Request $request) {
        $input = $request->input();
        $product_providers = json_decode($this->reseller_api->getProductProviders());
        $partnerships = [];
        foreach ($product_providers as $product_provider) {
            if (isset($input[$product_provider->id])) {
                $partnerships[] = [
                    'providerId' => $product_provider->id,
                    'partnerId' => $input[$product_provider->id]
                ];
            }
        }
        $main_address = [
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state
        ];
        $primary_contact = [
            'firstName' => $request->first_name,
            'lastName' => $request->last_name,
            'phone' => $request->contact_phone,
            'email' => $request->contact_email,
            'primary' => true
        ];
        $params = [
            'companyName' => $request->company_name,
            'mainAddress' => $main_address,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'primaryContact' => $primary_contact,
            'creditLimit' => 0,
            'partnerships' => $partnerships,
            'password' => $request->password
        ];
        $response = $this->reseller_api->createAccount($params);
        if ($response == null) {
            return Redirect::back()
                    ->with('error', Alert::format('Error!', 'We could not create your account. Please try again.'));
        } else {
            return Redirect::route('pos_index')
                ->with('success', Alert::format('Your account has been created!', 'You can now start selling.'));
        }
    }

}
