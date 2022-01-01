<?php
namespace App\Http\Traits;

trait Category_PolicyTrait
{
    private function show_category_policies()
    {
        return $this->categoryPolicyModel::get();
    }

    private function get_category_policy_by_id($id)
    {
        return $this->categoryPolicyModel::find($id);
    }


}
