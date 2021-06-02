<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DProductVersion extends Model
{
    use HasHashSlug;

    protected $table = "product_versions";

    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\DProduct');
    }

    public function version() {
        return $this->belongsTo('App\DVersion');
    }
}
