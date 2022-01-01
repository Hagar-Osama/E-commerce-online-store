<?php
namespace App\Http\Interfaces;



use Illuminate\Http\Request;

interface Category_PolicyInterface
{
    public function get_category_policy();

    public function create_category_policy();

    public function store_category_policy(Request $request);

    public function edit_category_policy($id);

    public function update_category_policy(Request $request);

    public function delete_category_policy(Request $request);
}
