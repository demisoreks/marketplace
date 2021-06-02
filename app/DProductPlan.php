<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DProductPlan extends Model
{
    use HasHashSlug;

    protected $table = "product_plans";

    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\DProductPlan');
    }

    public function productPlanCodes() {
        return $this->hasMany('App\DProductPlanCode');
    }
}
