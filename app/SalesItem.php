<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasHashSlug;

    protected $table = "sales_items";

    protected $guarded = [];

    public function sale() {
        return $this->belongsTo('App\Sale');
    }
}
