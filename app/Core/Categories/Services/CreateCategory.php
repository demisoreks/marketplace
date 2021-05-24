<?php

namespace App\Core\Categories\Services;

use App\Core\Services\DbRecord;
use App\DCategory;

trait CreateCategory {

    public function createCategory($data) {
        $response = [];
        $record_check = DbRecord::check('categories', ['name' => $data['name']]);
        if ($record_check != "") {
            $response['error'] = $record_check;
        } else {
            $category = DCategory::create($data);
            if ($category) {
                $response['data'] = $category;
            } else {
                $response['error'] = "Category was not created.";
            }
        }
        return $response;
    }

}
