<?php

namespace App\Http\Requests\SubCategories;

use App\Models\SubCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCategoryRequest extends FormRequest
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
        return array_merge(SubCategory::rule(),[
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image' => 'mimes:png,jpg,jpeg,webp'
        ]);
    }
}
