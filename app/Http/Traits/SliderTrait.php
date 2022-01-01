<?php

namespace App\Http\Traits;

trait SliderTrait
{
    private function show_all_sliders()
    {
        return $this->sliderModel::get();
    }
}
