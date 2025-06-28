<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Category;

class CategoryController
{
    public function anyIndex()
    {
        $response = (new Category)->fetchAllCategories();
        return json_encode($response);
    }

    public function anyCategory(string $param): string
    {
        $response = (new Category)->fetchCategoryById($param);
        return json_encode($response);
    }

    public function getCategory(): string
    {
        $response = (new Category)->fetchCategoryById();
        return json_encode($response);
    }

    public function postCategory(): string
    {
        $response = (new Category)->createCategory();
        return json_encode($response);
    }

    public function putCategory(): string
    {
        $response =  (new Category)->updateCategory();
        return json_encode($response);
    }

    public function deleteCategory(): string
    {
        $response =  (new Category)->dropCategory();
        return json_encode($response);
    }
}
