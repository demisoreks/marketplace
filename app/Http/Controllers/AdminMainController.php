<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class AdminMainController extends Controller
{

    public function index() {
        if (Cookie::get('icommerce_admin')) {
            return Redirect::route('admin_dashboard');
        }

        return view('admin.index');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

}
