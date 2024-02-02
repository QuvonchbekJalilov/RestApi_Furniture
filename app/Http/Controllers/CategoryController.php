<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Category::class, 'category');
    }

    public function index()
    {
        return $this->response(Category::all());
    }



    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());

        return $this->success('category successfully added');
    }


    public function show(Category $category)
    {
        return $this->response(new CategoryResource($category));
    }


   

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return $this->success('category successfully updated');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return $this->success('category successfully deleted');
    }
}
