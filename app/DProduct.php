<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DProduct extends Model
{
    use HasHashSlug;

    protected $table = "products";

    protected $guarded = [];

    public function vendor() {
        return $this->belongsTo('App\DVendor');
    }

    public function productCategories() {
        return $this->hasMany('App\DProductCategory');
    }

    public function productRequirements() {
        return $this->hasMany('App\DProductRequirement');
    }

    public function productFeatures() {
        return $this->hasMany('App\DProductFeature');
    }

    public function productLanguages() {
        return $this->hasMany('App\DProductLanguage');
    }

    public function productVersions() {
        return $this->hasMany('App\DProductVersion');
    }

    public function productPlans() {
        return $this->hasMany('App\DProductPlan');
    }

    public function productFaqs() {
        return $this->hasMany('App\DProductFaq');
    }
}
