<?php

namespace App\Core\Categories\Services;

use App\Core\Services\DbRecord;
use App\DCategory;

trait UpdateCategory {

    public function updateCategory(DCategory $category, $data) {
        $response = [];
        $record_check = DbRecord::checkExcept('categories', ['name' => $data['name']], 'id', $category->id);
        if ($record_check != "") {
            $repsonse['error'] = $record_check;
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
