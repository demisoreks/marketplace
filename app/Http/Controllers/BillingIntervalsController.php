<?php

namespace App\Http\Controllers;

use App\Core\BillingIntervals\IBillingInterval;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DBillingInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BillingIntervalsController extends Controller
{

    private $_billing_interval;

    public function __construct(IBillingInterval $billing_interval)
    {
        $this->_billing_interval = $billing_interval;
    }

    public function index() {
        $active_billing_intervals = $this->_billing_interval->getBillingIntervalsByActive(true);
        $disabled_billing_intervals = $this->_billing_interval->getBillingIntervalsByActive(false);
        return view('admin.billing_intervals.index', compact('active_billing_intervals', 'disabled_billing_intervals'));
    }

    public function create() {
        return view('admin.billing_intervals.create');
    }

    public function store(Request $request) {
        $data = [
            'name' => $request->name,
            'months' => $request->months
        ];
        $response = $this->_billing_interval->createBillingInterval($data);
        if (isset($response['data'])) {
            Log::info("Billing interval was created - ".$request->name);

            return Redirect::route('billing_intervals.index')
                    ->with('success', Alert::format('Completed!', 'Billing interval was created.'));
        } else {
            Log::info("Billing interval was not created - ".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function edit(DBillingInterval $billing_interval) {
        return view('admin.billing_intervals.edit', compact('billing_interval'));
    }

    public function update(DBillingInterval $billing_interval, Request $request) {
        $data = [
            'name' => $request->name,
            'months' => $request->months
        ];
        $response = $this->_billing_interval->updateBillingInterval($billing_interval, $data);
        if (isset($response['data'])) {
            Log::info("Billing interval was updated - ".$request->name);

            return Redirect::route('billing_intervals.index')
                    ->with('success', Alert::format('Completed!', 'Billing interval was updated.'));
        } else {
            Log::info("Billing interval was not updated - ".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function disable(DBillingInterval $billing_interval) {
        $this->_billing_interval->disable($billing_interval);
        Log::info("Billing interval was disabled - ".$billing_interval->name);

        return Redirect::route('billing_intervals.index')
                ->with('success', Alert::format('Completed!', 'Billing interval was disabled.'));
    }

    public function enable(DBillingInterval $billing_interval) {
        $this->_billing_interval->enable($billing_interval);
        Log::info("Billing interval was enabled - ".$billing_interval->name);

        return Redirect::route('billing_intervals.index')
                ->with('success', Alert::format('Completed!', 'Billing interval was enabled.'));
    }

}
