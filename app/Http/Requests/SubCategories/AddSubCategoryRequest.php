<?php

namespace App\Http\Requests\SubCategories;

use App\Models\SubCategory;
use Illuminate\Foundation\Http\FormRequest;

class AddSubCategoryRequest extends FormRequest
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
     * @return string[]
     */
    public function rules()
    {
        return SubCategory::rule();
//        switch ($this->method()){
//            case 'POST':
//                return [
//                    // validation for post method
//                    'name' => 'required|min:3',
//                    'select' => 'required|exists:categories,id',
//                    'image' => 'required|file|mimes:png,webp,jpg,jpeg'
//                ];
//                break;
//            case 'delete':
//                return [
//                    // validation for delete method
//                    'sub_cat_id' => 'required|exists:sub_categories,id',
//                ];
//                break;
//            case 'PUT':
//                return [
//                    // validation for put method
//                    'sub_cat_id' => 'required|exists:sub_categories,id',
//                    'name' => 'required|min:3',
//                    'image' => 'mimes:png,webp,jpg,jpeg',
//                    'select' => 'required|exists:categories,id'
//                ];
//                break;
//            default:
//                return [];
//                break;
//        }
    }

}
