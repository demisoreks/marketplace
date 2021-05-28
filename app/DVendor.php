<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DVendor extends Model
{
    use HasHashSlug;

    protected $table = "vendors";

    protected $guarded = [];
}
