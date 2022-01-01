<?php
namespace App\Http\Interfaces;

use Illuminate\Http\Request;

interface SizeUnitInterface
{
    public function get_size_unit();

    public function create_new_size_unit();

    public function store_size_unit(Request $request);

    public function edit_size_unit($id);

    public function update_size_unit(Request $request);

    public function delete_size_unit(Request $request);
}
