<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicyRequest extends FormRequest
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
                    'name' => 'required|min:3',
                    'select' => 'required|exists:category_policies,id',
                    'description' => 'required|min:10'
                ];
                break;
            case 'delete':
                return [
                    // validation for delete method
                    'policy_id' => 'required|exists:policies,id',
                ];
                break;
            case 'PUT':
                return [
                    // validation for put method
                    'policy_id' => 'required|exists:policies,id',
                    'name' => 'required|min:3',
                    'description' => 'required|min:10',
                    'select' => 'required|exists:category_policies,id'
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
            'name.required' => 'Size Name Is Required',
            'name.min' => 'Length Is Too small ',
            'select.required' => 'SizeUnit Is Required',
            'description.required' => 'Description Required, please do it',
            'description.min' => 'Description Is Too Short at minimum 10Chars '

        ];
    }
}
