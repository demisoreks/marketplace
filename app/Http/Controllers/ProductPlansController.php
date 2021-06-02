<?php

namespace App\Http\Controllers;

use App\Core\Products\Plans\IProductPlan;
use App\DProduct;
use Illuminate\Http\Request;

class ProductPlansController extends Controller
{

    private $_product_plan;

    public function __construct(IProductPlan $product_plan)
    {
        $this->_product_plan = $product_plan;
    }

    public function create(DProduct $product) {
        return view('admin.product_plans.create', compact('product'));
    }

}
