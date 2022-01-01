<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\HelperTrait;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryRepository implements CategoryInterface
{
    use CategoryTrait;

    private $categoryModel;
    public function __construct(Category $cat)
    {
        $this->categoryModel = $cat;
    }

    public function index()
    {
        $categories = $this->getCategories();
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'categories',
            'has_scrollspy' => 0,
            'alt_menu' => 'page_name',
            'scrollspy_offset' => '',
        ];
        return view('admin.categories.index', compact('categories'))->with($data);
    }

    public function create()
    {
      $data = [
        'page_name' => 'create categories',
        'has_scrollspy' => 0,
        'alt_menu' => 'page_name',
        'scrollspy_offset' => '',
        'category_name' => 'Create Cat',
      ];
        return view('admin.categories.create')->with($data);
    }

    public function store($request)
    {
        $this->categoryModel::create([
            'name' => $request->name,
        ]);
        session()->flash('Success', 'Category has been added successfully');
        return redirect(route('categories.index'));
    }

    public function edit($categoryId)
    {
      $data = [
          'category_name' => 'dashboard',
          'page_name' => 'Edit Categories',
          'has_scrollspy' => 0,
          'alt_menu' => 'page_name',
          'scrollspy_offset' => '',
      ];
        $edit = $this->getCategoryById($categoryId);
        return view('admin.categories.edit', compact('edit'))->with($data);
    }

    public function update($request)
    {
        $cat = $this->getCategoryById($request->cat_id);
            $cat->update([
                'name' => $request->name,
            ]);
            session()->flash('success', 'Category has been updated Successfully');
            return redirect(route('categories.index'));
    }

    public function destroy($categoryId)
    {
        $cat = $this->getCategoryById($categoryId);
            $cat->delete();
            session()->flash('success', 'Category has been deleted Successfully');
            return redirect(route('categories.index'));
    }
}
