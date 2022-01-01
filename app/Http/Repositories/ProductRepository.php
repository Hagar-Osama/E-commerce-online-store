<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductInterface;
use App\Http\Traits\ImageTrait;
use App\Http\Traits\ProductsTrait;
use App\Http\Traits\SubCategoriesTrait;
use App\Imports\ProductImport;
use App\Imports\ProductUpdate;
use App\Models\Lang;
use App\Models\Product;
use App\Models\ProductName;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Artisan;
use Maatwebsite\Excel\Facades\Excel;

class ProductRepository implements ProductInterface
{
    use ProductsTrait;
    use SubCategoriesTrait;
    use ImageTrait;
    private $productModel;
    private $subCategoryModel;
    public function __construct(Product $product, SubCategory $subCategory)
    {
        $this->productModel = $product;
        $this->subCategoryModel = $subCategory;
    }

    public function show_product()
    {
        $products = $this->get_all_products(); //ProductsTrait
        return view('admin.products.index',compact('products'));
    }

    public function create_new_product()
    {
        $subcategories = $this->show_sub_categories();
        return view('admin.products.create',compact('subcategories'));
    }

    public function store_product($request)
    {
        $image = $request->file('image');
        $image_name = $this->uploadImage($image,'products');
        $product = $this->productModel::create([
            'description' => $request->description,
            'main_image'  => $image_name,
            'price'       => $request->price,
            'sub_category_id' => $request->select
        ]);

        $langs = Lang::get();
        foreach ($langs as $lang){
            $name = 'name_'. $lang->name;
            ProductName::create([
                'product_id' => $product->id,
                'lang_id' =>  $lang->id,
                'name' =>  $request->$name,
        ]);
        }
        Session()->flash('done','produc created Successfully');
        return redirect(route('products.index'));

    }

    public function edit_product($id)
    {
        $product = $this->get_product_by_id($id);
        $subcategories = $this->show_sub_categories();
       //$productName = ProductName::with('langs')->get()->first();
        //dd($productName);
        return view('admin.products.edit',compact('product','subcategories'));
    }

    public function update_product($request)
    {
        // TODO: Implement update_product() method.
    }

    public function delete_product($request)
    {
        // TODO: Implement delete_product() method.
    }

    public function uploadPage()
    {
        return view('admin.products.upload');
    }

    public function upload($request)
    {
        Excel::import(new ProductImport, $request->file('file'));
        Session('done','Data Has Been Uploaded');
        return redirect()->route('products.index');
    }

    public function updateUploadPage()
    {
        return view('admin.products.update-upload');
    }

    public function updateUpload($request)
    {
        Excel::import(new ProductUpdate(), $request->file('file'));
        Session('done','Data Has Been Updated');
        return redirect()->route('products.index');
    }

    public function scanProductImages()
    {
        Artisan::call('scan:images');
        Session()->flash('done','Images Scanned Successfully');
        return redirect(route('products.index'));
    }
}
