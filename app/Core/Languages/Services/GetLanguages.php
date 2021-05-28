<?php

namespace App\Core\Languages\Services;

use App\DLanguage;

trait GetLanguages {

    public function getLanguages() {
        $languages = DLanguage::all();
        return $languages;
    }

    public function getLanguagesByActive($active) {
        $languages = DLanguage::where('active', $active)->get();
        return $languages;
    }

}
