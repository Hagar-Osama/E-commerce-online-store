<?php
namespace App\Http\Traits;

trait SizeTrait
{
    private function get_all_sizes()
    {
        return $this->sizeModel::get();
    }

    private function get_size_by_id($id)
    {
        return $this->sizeModel::find($id);
    }

}
