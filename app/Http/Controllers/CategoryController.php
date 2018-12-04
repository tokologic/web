<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use App\Traits\Crud;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Crud;

    public function index(CategoriesDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-tag', 'title' => 'Kategori'];
        return $dataTable->render('categories.index', compact('page'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->get('name');
        $category->save();
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $data = $this->gatherRequest(Category::class, $request);
        $category->update($data);
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $e) {
        }
    }
}
