<?php

namespace App\Core\Categories\Services;

use App\Core\Services\DbRecord;
use App\DCategory;

trait UpdateCategory {

    public function updateCategory(DCategory $category, $data) {
        $response = [];
        $recordCheck = DbRecord::checkExcept('categories', ['name' => $data['name']], 'id', $category->id);
        if ($recordCheck != "") {
            $repsonse['error'] = $recordCheck;
        } else {
            if ($category->update($data)) {
                $response['data'] = $category;
            } else {
                $response['error'] = "Category was not updated.";
            }
        }
        return $response;
    }

}
