<?php
namespace App\Http\Traits;

trait ProductDetailsTrait
{
    private function show_all_product_details()
    {
        return $this->productDetailsModel::get();
    }

    private function get_product_details_by_id($id)
    {
        return $this->productDetailsModel::find($id);
    }
}
