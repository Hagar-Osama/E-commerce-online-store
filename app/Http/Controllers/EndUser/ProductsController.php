<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Repositories\EndUser\ProductsRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function subCategoryProducts($subCategoryId, $lang)
    {
        return $this->productsRepository->subCategoryProducts($subCategoryId, $lang);
    }

    public function productDetail($productId, $lang)
    {
        return $this->productsRepository->productDetail($productId, $lang);
    }
}
