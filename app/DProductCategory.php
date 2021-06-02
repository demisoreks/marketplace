<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DProductCategory extends Model
{
    use HasHashSlug;

    protected $table = "product_categories";

    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\DProduct');
    }

    public function category() {
        return $this->belongsTo('App\DCategory');
    }
}
