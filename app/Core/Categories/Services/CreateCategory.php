<?php

namespace App\Core\Categories\Services;

use App\Core\Services\DbRecord;
use App\DCategory;

trait CreateCategory {

    public function createCategory($data) {
        $response = [];
        $recordCheck = DbRecord::check('categories', ['name' => $data['name']]);
        if ($recordCheck != "") {
            $response['error'] = $recordCheck;
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
