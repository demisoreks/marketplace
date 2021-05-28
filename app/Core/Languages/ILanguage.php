<?php

namespace App\Core\Languages;

use App\DLanguage;

interface ILanguage {

    public function getLanguages();

    public function getLanguagesByActive($active);

    public function createLanguage($data);

    public function updateLanguage(DLanguage $language, $data);

    public function disable(DLanguage $language);

    public function enable(DLanguage $language);

}
