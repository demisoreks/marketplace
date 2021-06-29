<?php

namespace App\Core\Categories\Services;

use App\DCategory;

trait GetCategories {

    public function getCategories() {
        $categories = DCategory::all()->orderBy('name');
        return $categories;
    }

    public function getCategoriesByActive($active) {
        $categories = DCategory::where('active', $active)->orderBy('name')->get();
        return $categories;
    }

}
