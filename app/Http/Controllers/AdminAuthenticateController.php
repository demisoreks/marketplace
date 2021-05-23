<?php

namespace App\Http\Controllers;

use App\Core\Administrators\IAdministrator;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminAuthenticateController extends Controller
{

    private $_administrator;

    public function __construct(IAdministrator $administrator)
    {
        $this->_administrator = $administrator;
    }

    public function authenticate(Request $request) {
        $administrator = $this->_administrator->authenticate($request->email, hash('sha512', $request->password));
        if ($administrator == null) {
            Log::info("A login attempt failed - ".$request->email);

            return Redirect::route('admin_index')
                    ->with('error', Alert::format('Authentication failed!', 'Please contact a super administrator.'));
        } else {
            Log::info("A login attempt was successful - ".$request->email);

            $this->_administrator->login($administrator);
            return Redirect::route('admin_dashboard');
        }
    }

    public function logout() {
        Log::info("An administrator logged out");

        $this->_administrator->logout();
        return Redirect::route('admin_index')
                ->with('success', Alert::format('Completed!', 'You have successfully logged out.'));
    }

}
