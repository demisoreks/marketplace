<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DProductRequirement extends Model
{
    use HasHashSlug;

    protected $table = "product_requirements";

    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\DProduct');
    }
}
