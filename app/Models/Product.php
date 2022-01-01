<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Request;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'price', 'main_image','sub_category_id'];

    protected $appends = ['name'];


    public static function rule()
    {
        return [
            'name_en' =>   'required|min:3',
            'name_ar' =>   'required|min:3|',
            'price'   =>   'required|numeric',
            'description' => 'required',
            'image'   =>   'required|mimes:png,jpg,jpeg,webp',
            'select'  =>   'required|exists:sub_categories,id'
        ];
    }

    public static function SheetRule()
    {
        return [
            'name_en' => 'required',
            'name_ar' => 'required',
            'description' => 'required',
            'price' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id'
        ];
    }

    public static function UpdateSheetRule()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'name_en' => 'required',
            'name_ar' => 'required',
            'description' => 'required',
            'price' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id'
        ];
    }

    public function getMainImageAttribute($value)
    {
        return env('AWS_URL') . 'products/' . $value;
    }

    /**
     * RelationShip Product && ProductName
     * @return HasMany
     */
    public function productName() :HasMany
    {
        return $this->hasMany(ProductName::class,'product_id', 'id');
    }

    /**
     * Relation Product && ProductDetails
     * @return HasMany
     */
    public function productDetails() :HasMany
    {
        return $this->hasMany(ProductDetails::class, 'product_id', 'id');
    }

    /**
     * Relation Product && ProductDiscount
     * @return HasMany
     */
    public function productDiscount() :HasMany
    {
        return $this->hasMany(ProductDiscount::class, 'product_id', 'id');
    }

    /**
     * Relation Product && WishLists
     * @return HasMany
     */
    public function wishLists() :HasMany
    {
        return $this->hasMany(WishList::class, 'product_id', 'id');
    }

    /**
     *  Relationship Sub_Category && Product
     * @return BelongsTo
     */
    public function sub_category() :BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public function getNameAttribute()
    {
        $path = Request::path();
        $pathData = explode('/',$path);
        $lang =  end($pathData);
        $allowLangs = ['en', 'ar'];
        if(is_null($lang) || !in_array($lang, $allowLangs))
        {
            $lang = 'en';
        }
        $langData = Lang::where('name', $lang)->select('id')->first();
        $langId = $langData->id;
        $productName = ProductName::where([ ['product_id', $this->id], ['lang_id', $langId] ])->select('name')->first();
        return ($productName) ? $productName->name : 'not found';
    }

    public function getSizesAttribute()
    {
        $data = [];
        $sizes = ProductDetails::where('product_id', $this->id)->with('size')->select(['size_id', 'id'])->get();
        foreach ($sizes as $size)
        {
            $data[$size->size_id] = $size->size->name;
        }
        return $data;
    }

    public function getFirstSizeColorsAttribute()
    {
        $data = [];
        $sizeId = ProductDetails::where('product_id', $this->id)->select('size_id')->first();
        if($sizeId)
        {
            $colors = ProductDetails::where([ ['product_id', $this->id], ['size_id', $sizeId->size_id] ])->with('color')->select('color_id', 'id')->get();
            foreach($colors as $color)
            {
                $data[$color->color_id] = $color->color->hex_code;
            }
        }
        return $data;
    }

    public function getFistColorStockAttribute()
    {
        $data = ProductDetails::where('product_id', $this->id)->select('size_id', 'color_id')->first();
        if($data)
        {
            $stock = ProductDetails::where([ ['product_id', $this->id], ['size_id', $data->size_id], ['color_id', $data->color_id] ])->first();
            return $stock->stock;
        }
       return null;
    }

    public function size()
    {
        return $this->hasOneThrough(Size::class, ProductDetails::class);
    }
}
