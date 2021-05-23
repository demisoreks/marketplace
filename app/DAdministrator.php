<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DAdministrator extends Model
{
    use HasHashSlug;

    protected $table = "administrators";

    protected $guarded = [];
}
