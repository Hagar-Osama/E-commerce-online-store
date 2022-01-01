<?php
namespace App\Http\Traits;

trait SubCategoriesTrait
{

    private function show_sub_categories()
    {
        return $this->subCategoryModel::get();
    }

    private function get_sub_category_by_id($id)
    {
        return $this->subCategoryModel::find($id);
    }

    private function count_subCategories()
    {
        return $this->subCategoryModel::get()->count();
    }
}
