<?php
namespace App\Http\Interfaces;

interface ProductInterface
{
    public function show_product();

    public function create_new_product();

    public function store_product($request);

    public function edit_product($id);

    public function update_product($request);

    public function delete_product($request);

    public function uploadPage();

    public function upload($request);

    public function updateUploadPage();

    public function updateUpload($request);

    public function scanProductImages();

}
