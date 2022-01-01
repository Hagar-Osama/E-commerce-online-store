<?php
namespace App\Http\Traits;

trait SizeUnitTrait
{
    private function get_size_units()
    {
        return $this->sizeUnitModel::get();
    }

    private function get_size_units_by_id($id)
    {
        return $this->sizeUnitModel::find($id);
    }

    /**
     * relationship between Size model && SizeUnit
     * @return mixed
     */
    private function get_sizes_with_unit_size()
    {
        return $this->sizeUnitModel::with('sizes')->first();
    }
}
