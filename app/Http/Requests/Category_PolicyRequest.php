<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Category_PolicyRequest extends FormRequest
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
        switch ($this->method()){
            case 'POST':
                return [
                    // validation for post method
                    'name' => 'required|min:3'
                ];
                break;
            case 'delete':
                return [
                    // validation for delete method
                    'cat_id' => 'required|exists:category_policies,id',
                ];
                break;
            case 'PUT':
                return [
                    // validation for put method
                    'cat_id' => 'required|exists:category_policies,id',
                    'name' => 'required|min:3'
                ];
                break;
            default:
                return [];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'CategoryPolicy Name Is Required',
            'name.min' => 'Length Is Too small '
        ];
    }
}
