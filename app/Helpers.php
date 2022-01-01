<?php

use Illuminate\Support\Collection;

function getData(Collection $data, $attr)
{
    return $data->has($attr) ? $data[$attr] : null;
}

function checkValue($val)
{
    return !empty($val) && !is_null($val);
}

function ShowImage($image) : string
{
    if (! is_null($image) && !empty($image) && File::exists(public_path('images').'/' . $image)) {
        return asset('images/' . $image);
    }
    return 'No Image';
}
