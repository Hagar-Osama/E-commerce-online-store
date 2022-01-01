<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\ProductDetailsInterface;
use App\Http\Traits\ProductDetailsTrait;
use App\Imports\ProductDetailsImport;
use App\Models\ProductDetails;
use Maatwebsite\Excel\Facades\Excel;


class ProductDetailsRepository implements ProductDetailsInterface
{
    use ProductDetailsTrait;
   private $productDetailsModel;
   public function __construct(ProductDetails $productDetails)
   {
       $this->productDetailsModel = $productDetails;
   }

    public function uploadPage()
    {
        return view('admin.productDetails.upload');
    }

    public function uploadFile($request)
    {
        Excel::import(new ProductDetailsImport, $request->file('file'));
        Session()->flash('done','ProductDetails Has Been Uploaded');
        return redirect()->back();
    }

    public function index()
    {
        $products = $this->show_all_product_details();
        //$products = $this->productDetailsModel::with('products')->get()->first();
        //dd($products);
        return view('admin.productDetails.index',compact('products'));
    }


    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store($request)
    {
        // TODO: Implement store() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function delete($request)
    {
        // TODO: Implement delete() method.
    }
}
