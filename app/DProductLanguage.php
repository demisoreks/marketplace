<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DProductLanguage extends Model
{
    use HasHashSlug;

    protected $table = "product_languages";

    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\DProduct');
    }

    public function language() {
        return $this->belongsTo('App\DLanguage');
    }
}
