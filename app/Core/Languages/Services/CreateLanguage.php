<?php

namespace App\Core\Languages\Services;

use App\Core\Services\DbRecord;
use App\DLanguage;

trait CreateLanguage {

    public function createLanguage($data) {
        $response = [];
        $record_check = DbRecord::check("languages", ['name' => $data['name']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $language = DLanguage::create($data);
            if ($language) {
                $response['data'] = $language;
            } else {
                $response['error'] = "Language was not created.";
            }
        }
        return $response;
    }

}
