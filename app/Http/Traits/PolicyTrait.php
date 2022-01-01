<?php
namespace App\Http\Traits;

trait PolicyTrait
{
    private function show_policies()
    {
        return $this->policyModel::get();
    }

    private function get_policy_by_id($id)
    {
        return $this->policyModel::find($id);
    }

    private function get_policy_by_category()
    {
        return $this->policyModel::with('categoryPolicy')->get();
    }
}
