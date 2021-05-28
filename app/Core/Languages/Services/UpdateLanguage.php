<?php

namespace App\Core\Languages\Services;

use App\Core\Services\DbRecord;
use App\DLanguage;

trait UpdateLanguage {

    public function updateLanguage(DLanguage $language, $data) {
        $response = [];
        $record_check = DbRecord::checkExcept('languages', ['name' => $data['name']], 'id', $language->id);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            if ($language->update($data)) {
                $response['data'] = $language;
            } else {
                $response['error'] = "Language was not updated.";
            }
        }
        return $response;
    }

}
