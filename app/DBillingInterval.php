<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DBillingInterval extends Model
{
    use HasHashSlug;

    protected $table = "billing_intervals";

    protected $guarded = [];
}
