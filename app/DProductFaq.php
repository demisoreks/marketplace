<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DProductFaq extends Model
{
    use HasHashSlug;

    protected $table = "product_faqs";

    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\DProduct');
    }
}
