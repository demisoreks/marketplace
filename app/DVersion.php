<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DVersion extends Model
{
    use HasHashSlug;

    protected $table = "versions";

    protected $guarded = [];
}
