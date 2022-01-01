<?php
namespace App\Http\Interfaces;

use Illuminate\Http\Request;

interface SizeInterface
{
    public function get_sizes();

    public function create_new_size();

    public function store_size(Request $request);

    public function edit_size($id);

    public function update_size(Request $request);

    public function delete_size(Request $request);
}
