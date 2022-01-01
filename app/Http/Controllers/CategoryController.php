<?php

namespace App\Http\Controllers;
use App\Http\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\categories\AddCategoryRequest;
use App\Http\Requests\categories\UpdateCategoryRequest;

class CategoryController extends Controller
{
  private $CategoryInterface;
  public function __construct(CategoryInterface $CategoryInterface)
  {
      $this->CategoryInterface = $CategoryInterface;
  }

  public function index()
  {
      return $this->CategoryInterface->index();
  }

  public function create()
  {
     return $this->CategoryInterface->create();
  }

  public function store(AddCategoryRequest $request)
  {
      return $this->CategoryInterface->store($request);
  }

  public function edit($categoryId)
  {
    return $this->CategoryInterface->edit($categoryId);
  }

  public function update(UpdateCategoryRequest $request)
  {
    return $this->CategoryInterface->update($request);
  }

  public function destroy($categoryId)
  {
    return $this->CategoryInterface->destroy($categoryId);
  }
}
