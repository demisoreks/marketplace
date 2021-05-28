<?php

namespace App\Http\Controllers;

use App\Core\Administrators\IAdministrator;
use App\Core\Services\Alert;
use App\Core\Services\Configuration;
use App\Core\Services\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ConfigurationController extends Controller
{

    private $_administrator;

    public function __construct(IAdministrator $administrator)
    {
        $this->_administrator = $administrator;
    }

    public function index() {
        $configuration = Configuration::get();
        if ($configuration == null) {
            return view('configuration');
        } else {
            return Redirect::route('configuration.edit');
        }
    }

    public function store(Request $request) {
        $configuration_data = [
            'name' => $request->name,
            'contact_address' => $request->contact_address,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'email' => $request->email,
            'colour1' => $request->colour1,
            'colour2' => $request->colour2,
            'logo_url' => $request->logo_url
        ];
        $administrator_data = [
            'name' => 'Super Administrator 1',
            'email' => $request->login_email,
            'password' => hash('sha512', $request->login_password),
            'super' => true
        ];
        Configuration::update($configuration_data);
        $response = $this->_administrator->createAdministrator($administrator_data);
        if (isset($response['error'])) {
            Log::info('Configuration was updated but administrator creation failed.');

            return Redirect::route('admin_index')
                    ->with('error', Alert::format('Configuration was updated.', $response['error']));
        } else {
            Log::info('Configuration was updated and administrator was created.');

            return Redirect::route('admin_index')
                    ->with('success', Alert::format('Configuration was updated.', 'Kindly log in with the credentials you just supplied.'));
        }
    }

    public function edit() {
        return view('admin.configuration.edit');
    }

    public function update(Request $request) {
        $data = [
            'name' => $request->name,
            'contact_address' => $request->contact_address,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'email' => $request->email,
            'colour1' => $request->colour1,
            'colour2' => $request->colour2,
            'logo_url' => $request->logo_url
        ];
        Configuration::update($data);

        Log::info('Configuration was updated.');

        return Redirect::route('configuration.edit')
                ->with('success', Alert::format('Completed!', 'Configuration was updated.'));
    }

}
