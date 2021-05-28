<?php

namespace App;

use Balping\HashSlug\HasHashSlug;
use Illuminate\Database\Eloquent\Model;

class DLanguage extends Model
{
    use HasHashSlug;

    protected $table = "languages";

    protected $guarded = [];
}
