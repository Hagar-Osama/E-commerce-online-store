<?php

namespace App\Http\Requests;

use App\Models\Cart;
use App\Models\ProductDetails;
use App\Rules\StockValidation;
use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
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

        $productDetail = ProductDetails::where([
            ['product_id', request('product_id')],
            ['size_id', request('size_id')],
            ['color_id', request('color_id')]])->select('id')->first();
        request()->request->add(['product_detail_id' => $productDetail->id]);

        return array_merge(Cart::rules(), ['stock' => ['required', new StockValidation( request('product_detail_id'))]]);
    }
}
