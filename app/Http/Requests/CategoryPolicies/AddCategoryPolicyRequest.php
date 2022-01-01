<?php

namespace App\Http\Requests\CategoryPolicies;

use App\Models\CategoryPolicy;
use Illuminate\Foundation\Http\FormRequest;

class AddCategoryPolicyRequest extends FormRequest
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
        return CategoryPolicy::rule();
    }
}
