<?php
namespace App\Http\Traits;

trait ProductsTrait
{
    /**
     * Get All Products From DB
     */
    private function get_all_products()
    {
        return $this->productModel::get();
    }

    /**
     * Get Product By ID FromDB
     * @param $id
     */
    private function get_product_by_id($id)
    {
        return $this->productModel::find($id);
    }
}
