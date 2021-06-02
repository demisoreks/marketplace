<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DProductFeature extends Model
{
    use HasHashSlug;

    protected $table = "product_features";

    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\DProduct');
    }
}
