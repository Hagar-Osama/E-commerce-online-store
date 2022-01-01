<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductInterface;
use App\Http\Requests\Products\AddProductRequest;
use App\Http\Requests\Products\DeleteProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    private $productInterface;
    public function __construct(ProductInterface $product)
    {
        $this->productInterface = $product;
    }

    public function index()
    {
        return $this->productInterface->show_product();
    }

    public function create()
    {
        return $this->productInterface->create_new_product();
    }

    public function store(AddProductRequest $request)
    {
        return $this->productInterface->store_product($request);
    }

    public function edit($id)
    {
        return $this->productInterface->edit_product($id);
    }

    public function update(UpdateProductRequest $request)
    {
        return $this->productInterface->update_product($request);
    }

    public function delete(DeleteProductRequest $request)
    {
        return $this->productInterface->delete_product($request);
    }

    public function uploadPage()
    {
        return $this->productInterface->uploadPage();
    }

    public function upload(Request $request)
    {
        return $this->productInterface->upload($request);
    }

    public function updateUploadPage()
    {
        return $this->productInterface->updateUploadPage();
    }

    public function uploadUpdate(Request $request)
    {
        return $this->productInterface->updateUpload($request);
    }

    public function scanImages()
    {
        return $this->productInterface->scanProductImages();
    }

}
