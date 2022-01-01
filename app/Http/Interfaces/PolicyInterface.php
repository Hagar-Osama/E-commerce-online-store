<?php
namespace App\Http\Interfaces;

use Illuminate\Http\Request;

interface PolicyInterface
{
    public function get_policy();

    public function create_new_policy();

    public function store_new_policy(Request $request);

    public function edit_policy($id);

    public function update_policy(Request $request);

    public function delete_policy(Request $request);
}
