<?php
namespace App\Http\Interfaces;


interface Sub_CategoryInterface
{
    public function get_sub_categories();

    public function create_sub_categories();

    public function store_sub_categories($request);

    public function edit_sub_categories($id);

    public function update_sub_categories($request);

    public function delete_sub_categories($request);
}
