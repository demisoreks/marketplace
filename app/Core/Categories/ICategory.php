<?php

namespace App\Core\Categories;

use App\DCategory;

interface ICategory {

    public function getCategories();

    public function getCategoriesByActive($active);

    public function createCategory($data);

    public function updateCategory(DCategory $category, $data);

    public function disable(DCategory $category);

    public function enable(DCategory $category);

}
