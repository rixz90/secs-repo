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

    public function getForm(): string
    {
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (isset($params['method']) == 'update' && isset($params['id'])) {
            $cat = (new Category)->fetchCategoryById($params['id']);

            if (empty($cat)) {
                return json_encode(["error" => 'Id not found']);
            }
            $arr['category'] = $cat;
            $arr['method'] = "PUT";
            var_dump($arr);
            return View::make('@panels/categoryPanel', $arr)->render();
        }
        return json_encode(["error" => 'Form not found']);
    }
}
