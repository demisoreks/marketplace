<?php

namespace App\Http\Controllers;

use App\Core\Services\Alert;
use App\Core\Services\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{

    private $_customer;

    public function __construct()
    {
        $this->_customer = new Customer;
    }

    public function create() {
        $do = request()->do;
        return view('register', compact('do'));
    }

    public function store(Request $request) {
        $error = "";
        if ($this->_customer->emailExists($request->email)) {
            $error .= "The supplied email address has been used.<br />";
        }
        if ($this->_customer->companyExists($request->company_name)) {
            $error .= "The supplied company name has been used.<br />";
        }
        if ($error != "") {
            return Redirect::back()
                    ->with('error', Alert::format('Account creation failed!', $error))
                    ->withInput();
        } else {
            $params = [
                'FirstName' => $request->first_name,
                'LastName' => $request->last_name,
                'CompanyName' => $request->company_name,
                'EmailAddress' => $request->email,
                'Address' => $request->address,
                'City' => $request->city,
                'State' => $request->state,
                'PhoneNumber' => $request->phone,
                'Password' => $request->password
            ];

            $customer = $this->_customer->create($params);
            if ($customer == null) {
                return Redirect::back()
                        ->with('error', Alert::format('Account creation failed!', 'Please contact us if issue persists.'))
                        ->withInput();
            } else {
                $this->_customer->login($customer);
                if ($request->do == "checkout") {
                    return Redirect::route('cart');
                }
                return Redirect::route('profile');
            }
        }
    }

    public function login() {
        if (Cookie::has('icommerce_customer')) {
            return Redirect::route('profile');
        }
        $do = request()->do;
        return view('login', compact('do'));
    }

    public function logout() {
        $this->_customer->logout();
        return Redirect::route('index');
    }

    public function authenticate(Request $request) {
        $params = [
            'UserName' => $request->email,
            'Password' => $request->password
        ];
        $customerId = $this->_customer->authenticate($params);
        if ($customerId == null) {
            return Redirect::back()
                    ->with('error', Alert::format('Login failed!', 'Invalid username and password.'));
        } else {
            $customer = $this->_customer->get($customerId);
            $this->_customer->login($customer);
            if ($request->do == "checkout") {
                return Redirect::route('cart');
            }
            return Redirect::route('customer.profile');
        }
    }

    public function profile() {
        return view('customer.profile');
    }

}
