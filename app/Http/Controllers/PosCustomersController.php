<?php

namespace App\Http\Controllers;

use App\Core\Resellers\IReseller;
use App\Core\Services\Alert;
use App\Core\Services\ResellerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class PosCustomersController extends Controller
{

    private $reseller_api;
    private $_reseller;

    public function __construct(IReseller $reseller)
    {
        $this->reseller_api = new ResellerApi;
        $this->_reseller = $reseller;
    }

    public function index() {
        $customers = $this->reseller_api->getCustomers($this->_reseller->getId());
        return view('pos.customers.index', compact('customers'));
    }

    public function create() {
        return view('pos.customers.create');
    }

    public function store(Request $request) {
        $input = $request->input();
        $main_address = [
            'street' => $request->address,
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
            'primaryContact' => $primary_contact
        ];
        $response = $this->reseller_api->createCustomer($this->_reseller->getId(), $params);
        if ($response == null) {
            return Redirect::back()
                    ->with('error', Alert::format('Error!', 'We could not create your customer. Please check details and try again.'))
                    ->withInput();
        } else {
            return Redirect::route('pos.customers.index')
                ->with('success', Alert::format('Completed!', 'Your customer was created successfully.'));
        }
    }

    public function edit($id) {
        $customer = $this->reseller_api->getCustomer($id);
        $customer->company_name = $customer->companyName;
        return view('pos.customers.edit', compact('customer'));
    }

}
