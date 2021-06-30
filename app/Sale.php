<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasHashSlug;

    protected $table = "sales";

    protected $guarded = [];

    public function salesItems() {
        return $this->hasMany('App\SalesItem');
    }
}
