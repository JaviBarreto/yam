<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Category as CategoryResource;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryApiController extends Controller
{

    public function GetFoodCategory(Category $category)
    {
        $category = Category::all();

        $category = CategoryResource::collection($category);

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => ['CategoryList' => $category],
        ]);

    }

}
