<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductDetailsInterface;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    private $productDetailsInterface;

    public function __construct(ProductDetailsInterface $productDetailsInterface)
    {
        $this->productDetailsInterface = $productDetailsInterface;
    }

    public function upload()
    {
        return $this->productDetailsInterface->uploadPage();
    }

    public function uploadFile(Request $request)
    {
        return$this->productDetailsInterface->uploadFile($request);
    }

    public function index()
    {
        return $this->productDetailsInterface->index();
    }

    public function create()
    {

    }
}
