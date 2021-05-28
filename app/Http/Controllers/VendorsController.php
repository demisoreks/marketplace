<?php

namespace App\Http\Controllers;

use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\Core\Vendors\IVendor;
use App\DVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VendorsController extends Controller
{

    private $_vendor;

    public function __construct(IVendor $vendor)
    {
        $this->_vendor = $vendor;
    }

    public function index() {
        $active_vendors = $this->_vendor->getVendorsByActive(true);
        $disabled_vendors = $this->_vendor->getVendorsByActive(false);
        return view('admin.vendors.index', compact('active_vendors', 'disabled_vendors'));
    }

    public function create() {
        return view('admin.vendors.create');
    }

    public function store(Request $request) {
        $data = [
            'name' => $request->name
        ];
        $response = $this->_vendor->createVendor($data);
        if (isset($response['data'])) {
            Log::info("Vendor was created - ".$request->name);

            return Redirect::route('vendors.index')
                    ->with('success', Alert::format('Completed!', 'Vendor was created.'));
        } else {
            Log::info("Vendor was not created - ".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function edit(DVendor $vendor) {
        return view('admin.vendors.edit', compact('vendor'));
    }

    public function update(DVendor $vendor, Request $request) {
        $data = [
            'name' => $request->name
        ];
        $response = $this->_vendor->updateVendor($vendor, $data);
        if (isset($response['data'])) {
            Log::info("Vendor was updated - ".$request->name);

            return Redirect::route('vendors.index')
                    ->with('success', Alert::format('Completed!', 'Vendor was updated.'));
        } else {
            Log::info("Vendor was not updated - ".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function disable(DVendor $vendor) {
        $this->_vendor->disable($vendor);
        Log::info("Vendor was disabled - ".$vendor->name);

        return Redirect::route('vendors.index')
                ->with('success', Alert::format('Completed!', 'Vendor was disabled.'));
    }

    public function enable(DVendor $vendor) {
        $this->_vendor->enable($vendor);
        Log::info("Vendor was enabled - ".$vendor->name);

        return Redirect::route('vendors.index')
                ->with('success', Alert::format('Completed!', 'Vendor was enabled.'));
    }

}
