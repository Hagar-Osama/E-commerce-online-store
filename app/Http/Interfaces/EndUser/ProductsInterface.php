<?php
namespace App\Http\Interfaces\EndUser;

use Illuminate\Http\Request;

interface ProductsInterface
{
    public function subCategoryProducts($subCategoryId, $lang);

    public function productDetail($productId, $lang);


}
