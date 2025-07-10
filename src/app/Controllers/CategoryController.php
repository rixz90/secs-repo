<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\Category;

class CategoryController
{
    public function anyIndex()
    {
        $cat = (new Category)->fetchAllCategories();
        return View::make('@tables/category', ["categories" => $cat])->render();
    }
    public function anyCategory(string $param): string
    {
        $cat = (new Category)->fetchCategoryById($param);
        return View::make('@tables/category', ["categories" => $cat])->render();
    }
    public function getCategory(): string
    {
        $cat = (new Category)->fetchCategoryById();
        return View::make('@panels/category', ["categories" => $cat])->render();
    }
    public function postCategory(): string
    {
        $response = (new Category)->createCategory();
        $cat = (new Category)->fetchAllCategories();
        return View::make('@tables/category', ["categories" => $cat, "response" => $response])->render();
    }
    public function putCategory(): string
    {
        $response =  (new Category)->update();
        $cat = (new Category)->fetchAllCategories();
        return View::make('@tables/category', ["categories" => $cat, "response" => $response])->render();
    }
    public function deleteCategory(): string
    {
        $response =  (new Category)->delete();
        $cat = (new Category)->fetchAllCategories();
        return View::make('@tables/category', ["categories" => $cat, "response" => $response])->render();
    }
    public function anyEdit(string $id): string
    {
        $category = (new Category)->fetchCategoryById(htmlspecialchars($id));
        if (empty($category)) {
            return json_encode(["error" => 'Id not found']);
        }
        $arr['categories'] = $category;
        $arr['method'] = "PUT";
        return view::make('@panels/categoryPanel', $arr)->render();
    }
}
