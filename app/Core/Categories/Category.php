<?php

namespace App\Core\Categories;

use App\Core\Categories\Services\CreateCategory;
use App\Core\Categories\Services\GetCategories;
use App\Core\Categories\Services\UpdateCategory;
use App\Core\Services\Disable;
use App\Core\Services\Enable;

class Category implements ICategory {

    use GetCategories, CreateCategory, UpdateCategory, Disable, Enable;

}
