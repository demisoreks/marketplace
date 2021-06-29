<?php

namespace App\Http\Controllers;

use App\Core\BillingIntervals\IBillingInterval;
use App\Core\Products\Features\IProductFeature;
use App\Core\Products\Plans\Codes\IProductPlanCode;
use App\Core\Products\Plans\IProductPlan;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DProduct;
use App\DProductPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductPlansController extends Controller
{

    private $_product_plan;
    private $_product_feature;
    private $_billing_interval;
    private $_product_plan_code;

    public function __construct(IProductPlan $product_plan, IProductFeature $product_feature, IBillingInterval $billing_interval, IProductPlanCode $product_plan_code)
    {
        $this->_product_plan = $product_plan;
        $this->_product_feature = $product_feature;
        $this->_billing_interval = $billing_interval;
        $this->_product_plan_code = $product_plan_code;
    }

    public function create(DProduct $product) {
        $product_features = $this->_product_feature->getProductFeatures($product);
        $billing_intervals = $this->_billing_interval->getBillingIntervalsByActive(true);
        return view('admin.product_plans.create', compact('product', 'product_features', 'billing_intervals'));
    }

    public function store(DProduct $product, Request $request) {
        $input = $request->input();
        $product_features = $this->_product_feature->getProductFeatures($product);
        $product_plan_features = [];
        foreach ($product_features as $product_feature) {
            if (isset($input['product_feature'.$product_feature->id])) {
                $product_plan_features[] = $product_feature->id;
            }
        }
        $product_plan_data = [
            'name' => $request->name,
            'features' => implode(',', $product_plan_features)
        ];
        $product_plan_response = $this->_product_plan->createProductPlan($product, $product_plan_data);
        if (isset($product_plan_response['data'])) {
            Log::info('Product plan was added - '.$product_plan_data['name']);
            $product_plan = $product_plan_response['data'];

            $billing_intervals = $this->_billing_interval->getBillingIntervalsByActive(true);
            foreach ($billing_intervals as $billing_interval) {
                if (isset($input['billing_interval'.$billing_interval->id])) {
                    $product_plan_code_data = [
                        'billing_interval_id' => $billing_interval->id,
                        'code' => $input['billing_interval'.$billing_interval->id]
                    ];
                    $product_plan_code_response = $this->_product_plan_code->createProductPlanCode($product_plan, $product_plan_code_data);
                    if (isset($product_plan_code_response['data'])) {
                        Log::info('Product plan code was added - '.$product_plan_code_data['code']);
                    } else {
                        Log::info('Product plan code was not created - '.$product_plan_code_response['error']);
                    }
                }
            }

            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product plan was added.'));
        } else {
            Log::info('Product plan was not created - '.$product_plan_response['error']);

            return Redirect::route('products.show', $product->slug())
                    ->with('error', Alert::format('Error!', $product_plan_response['error']));
        }
    }

    public function edit(DProduct $product, DProductPlan $product_plan) {
        $product_features = $this->_product_feature->getProductFeatures($product);
        $billing_intervals = $this->_billing_interval->getBillingIntervalsByActive(true);
        $features = explode(',', $product_plan->features);
        return view('admin.product_plans.edit', compact('product', 'product_plan', 'product_features', 'billing_intervals', 'features'));
    }

    public function update(DProduct $product, DProductPlan $product_plan, Request $request) {
        $input = $request->input();
        $product_features = $this->_product_feature->getProductFeatures($product);
        $product_plan_features = [];
        foreach ($product_features as $product_feature) {
            if (isset($input['product_feature'.$product_feature->id])) {
                $product_plan_features[] = $product_feature->id;
            }
        }
        $product_plan_data = [
            'name' => $request->name,
            'features' => implode(',', $product_plan_features)
        ];
        $product_plan_response = $this->_product_plan->updateProductPlan($product_plan, $product_plan_data);
        if (isset($product_plan_response['data'])) {
            Log::info('Product plan was updated - '.$product_plan_data['name']);
            $product_plan = $product_plan_response['data'];

            $billing_intervals = $this->_billing_interval->getBillingIntervalsByActive(true);
            foreach ($billing_intervals as $billing_interval) {
                if (isset($input['billing_interval'.$billing_interval->id])) {
                    $product_plan_codes = $this->_product_plan_code->getProductPlanCodesByBillingInterval($product_plan, $billing_interval);
                    if ($product_plan_codes->count() > 0) {
                        $product_plan_code_data = [
                            'code' => $input['billing_interval'.$billing_interval->id]
                        ];
                        $product_plan_code = $product_plan_codes->first();
                        $this->_product_plan_code->updateProductPlanCode($product_plan_code, $product_plan_code_data);
                    } else {
                        $product_plan_code_data = [
                            'billing_interval_id' => $billing_interval->id,
                            'code' => $input['billing_interval'.$billing_interval->id]
                        ];
                        $this->_product_plan_code->createProductPlanCode($product_plan, $product_plan_code_data);
                    }

                    Log::info('Product plan code for '.$billing_interval->name.' billing interval was updated.');
                } else {
                    $product_plan_codes = $this->_product_plan_code->getProductPlanCodesByBillingInterval($product_plan, $billing_interval);
                    foreach ($product_plan_codes as $product_plan_code) {
                        $this->_product_plan_code->delete($product_plan_code);
                    }

                    Log::info('Product plan codes for '.$billing_interval->name.' billing interval deleted.');
                }
            }

            return Redirect::route('products.show', $product->slug())
                    ->with('success', Alert::format('Completed!', 'Product plan was updated.'));
        } else {
            Log::info('Product plan was not updated - '.$product_plan_response['error']);

            return Redirect::route('products.show', $product->slug())
                    ->with('error', Alert::format('Error!', $product_plan_response['error']));
        }
    }

    public function destroy(DProduct $product, DProductPlan $product_plan) {
        $product_plan_codes = $this->_product_plan_code->getProductPlanCodes($product_plan);
        foreach ($product_plan_codes as $product_plan_code) {
            $this->_product_plan_code->delete($product_plan_code);
        }
        $this->_product_plan->delete($product_plan);

        Log::info('Product plan was deleted including its plan codes.');

        return Redirect::route('products.show', $product->slug())
                ->with('success', Alert::format('Completed!', 'Product plan was deleted.'));
    }

}
