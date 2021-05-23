<?php

namespace App\Http\Controllers;

use App\Core\Administrators\IAdministrator;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DAdministrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdministratorsController extends Controller
{

    private $_administrator;

    public function __construct(IAdministrator $administrator)
    {
        $this->_administrator = $administrator;
    }

    public function index() {
        $active_administrators = $this->_administrator->getAdministratorsByActive(true);
        $disabled_administrators = $this->_administrator->getAdministratorsByActive(false);
        return view('admin.administrators.index', compact('active_administrators', 'disabled_administrators'));
    }

    public function create() {
        return view('admin.administrators.create');
    }

    public function store(Request $request) {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash('sha512', $request->password),
            'super' => $request->super
        ];
        $response = $this->_administrator->createAdministrator($data);
        if (isset($response['data'])) {
            Log::info('Administrator was created - '.$request->email);

            return Redirect::route('administrators.index')
                    ->with('success', Alert::format('Completed!', 'Administrator was created.'));
        } else {
            Log::info('Administrator was not created - '.$request->email.' - '.$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function edit(DAdministrator $administrator) {
        return view('admin.administrators.edit', compact('administrator'));
    }

    public function update(DAdministrator $administrator, Request $request) {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'super' => $request->super
        ];
        if (isset($request->password) && $request->password != null && $request->password != "") {
            $data['password'] = hash('sha512', $request->password);
        }
        $response = $this->_administrator->updateAdministrator($administrator, $data);
        if (isset($response['data'])) {
            Log::info('Administrator was updated - '.$request->email);

            return Redirect::route('administrators.index')
                    ->with('success', Alert::format('Completed!', 'Administrator was updated.'));
        } else {
            Log::info('Administrator was not updated - '.$request->email.' - '.$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function disable(DAdministrator $administrator) {
        $this->_administrator->disable($administrator);
        Log::info('Administrator was disabled - '.$administrator->email);

        return Redirect::route('administrators.index')
                ->with('success', Alert::format('Completed!', 'Administrator was disabled.'));
    }

    public function enable(DAdministrator $administrator) {
        $this->_administrator->enable($administrator);
        Log::info('Administrator was enabled - '.$administrator->email);

        return Redirect::route('administrators.index')
                ->with('success', Alert::format('Completed!', 'Administrator was enabled.'));
    }

}
