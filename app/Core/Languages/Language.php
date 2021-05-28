<?php

namespace App\Core\Languages;

use App\Core\Languages\Services\CreateLanguage;
use App\Core\Languages\Services\GetLanguages;
use App\Core\Languages\Services\UpdateLanguage;
use App\Core\Services\Disable;
use App\Core\Services\Enable;

class Language implements ILanguage {

    use GetLanguages, CreateLanguage, UpdateLanguage, Disable, Enable;

}
