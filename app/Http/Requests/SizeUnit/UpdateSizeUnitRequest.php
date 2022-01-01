<?php

namespace App\Http\Requests\SizeUnit;

use App\Models\SizeUnit;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSizeUnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(SizeUnit::rule(), ['size_unit_id' => 'required|exists:size_units,id']);
    }
}
