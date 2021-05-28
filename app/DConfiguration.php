<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DConfiguration extends Model
{
    use HasHashSlug;

    protected $table = "configuration";

    protected $guarded = [];
}
