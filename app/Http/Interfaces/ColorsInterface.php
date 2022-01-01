<?php
namespace App\Http\Interfaces;

use Illuminate\Http\Request;

interface ColorsInterface {
    public function index();
    public function create();
    public function store($request);
    public function updatePage($id);
    public function update($request,$id);
    public function delete($id);
}
