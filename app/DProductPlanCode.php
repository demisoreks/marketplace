<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DProductPlanCode extends Model
{
    use HasHashSlug;

    protected $table = "product_plan_codes";

    protected $guarded = [];

    public function productPlan() {
        return $this->belongsTo('App\DProductPlan');
    }
}
