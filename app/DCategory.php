<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DCategory extends Model
{
    use HasHashSlug;

    protected $table = "categories";

    protected $guarded = [];
}
