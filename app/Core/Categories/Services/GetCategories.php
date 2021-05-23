<?php

namespace App\Core\Categories\Services;

use App\DCategory;

trait GetCategories {

    public function getCategories() {
        $categories = DCategory::all();
        return $categories;
    }

    public function getCategoriesByActive($active) {
        $categories = DCategory::where('active', $active)->get();
        return $categories;
    }

}
