<?php

namespace App\Rules;

use App\Models\Cart;
use App\Models\ProductDetails;
use Illuminate\Contracts\Validation\Rule;

class StockValidation implements Rule
{
    private $productDetailId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($productDetailId)
    {
        $this->productDetailId = $productDetailId;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cartCheck = Cart::where([ ['product_detail_id', $this->productDetailId], ['user_id', auth()->user()->id] ])->first();
        if($cartCheck){
            $value += $cartCheck->count;
        }
       return ProductDetails::where([ ['id', $this->productDetailId], ['stock', '>=', $value] ])->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No Stock for this Product';
    }
}
