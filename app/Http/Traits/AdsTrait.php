<?php

namespace App\Http\Traits;

trait AdsTrait
{
    private function show_all_ads()
    {
        return $this->adModel::get();
    }
}
