<?php
namespace App\Http\Interfaces;

use Illuminate\Http\Request;


interface CategoryInterface
{
  public function index();
  public function create();
  public function store($request);
  public function edit($categoryId);
  public function update($request);
  public function destroy($categoryId);
}
