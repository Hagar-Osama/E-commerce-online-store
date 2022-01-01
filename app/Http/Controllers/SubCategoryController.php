<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\Sub_CategoryInterface;
use App\Http\Requests\SubCategories\AddSubCategoryRequest;
use App\Http\Requests\SubCategories\DeleteSubCategoryRequest;
use App\Http\Requests\SubCategories\UpdateSubCategoryRequest;



class SubCategoryController extends Controller
{
    private $subCategoryInterface;
    public function __construct(Sub_CategoryInterface $subCategoryInterface)
    {
        $this->subCategoryInterface = $subCategoryInterface;
    }

    public function index()
    {
        return $this->subCategoryInterface->get_sub_categories();
    }

    public function create()
    {
        return $this->subCategoryInterface->create_sub_categories();
    }

    public function store(AddSubCategoryRequest $request)
    {
        return $this->subCategoryInterface->store_sub_categories($request);

    }

    public function edit($id)
    {
        return $this->subCategoryInterface->edit_sub_categories($id);
    }

    public function update(UpdateSubCategoryRequest $request)
    {
        return $this->subCategoryInterface->update_sub_categories($request);
    }

    public function delete(DeleteSubCategoryRequest $request)
    {
        return $this->subCategoryInterface->delete_sub_categories($request);
    }
}
