<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\Category_PolicyInterface;
use App\Http\Requests\CategoryPolicies\AddCategoryPolicyRequest;
use App\Http\Requests\CategoryPolicies\DeleteCategoryPolicyRequest;
use App\Http\Requests\CategoryPolicies\UpdateCategoryPolicyRequest;


class Category_PolicyController extends Controller
{
    private $categoryPolicyInterface;

    public function __construct(Category_PolicyInterface $category_Policy)
    {
        $this->categoryPolicyInterface = $category_Policy;
    }

    public function index()
    {
        return $this->categoryPolicyInterface->get_category_policy();
    }

    public function create()
    {
        return $this->categoryPolicyInterface->create_category_policy();
    }

    public function store(AddCategoryPolicyRequest $request)
    {
        return $this->categoryPolicyInterface->store_category_policy($request);
    }

    public function edit($id)
    {
        return $this->categoryPolicyInterface->edit_category_policy($id);
    }

    public function update(UpdateCategoryPolicyRequest $request)
    {
        return $this->categoryPolicyInterface->update_category_policy($request);
    }

    public function delete(DeleteCategoryPolicyRequest $request)
    {
        return $this->categoryPolicyInterface->delete_category_policy($request);
    }
}
