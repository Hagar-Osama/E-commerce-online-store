<?php

namespace App\Imports;

use App\Models\Lang;
use App\Models\Product;
use App\Models\ProductName;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class ProductUpdate implements ToModel,WithHeadingRow,WithValidation
{
    use Importable;
    private $row_number = 1;

    /**
    * @param array $row
    *
    * @return void
     */
    public function model(array $row)
    {
        $this->row_number++;
        $product = Product::find($row['product_id']);
        if ($product) {
            $product->update([
                'description' => $row['description'],
                'price' => $row['price'],
                'sub_category_id' => $row['sub_category_id']
            ]);
//            $langs = Lang::get();
//            foreach ($langs as $lang){
//                $productName = ProductName::find()
//                ProductName::create([
//                    'product_id' => $product->id,
//                    'lang_id' => $lang->id,
//                    'name' => $row['name_'.$lang->name]
//                ]);
//            }
        }else{
            $error = ['product_id' => 'Product ID Not Valid'];
            return $this->fail('product', $error, $row);
        }
        return null;
    }

    public function rules(): array
    {
       return Product::UpdateSheetRule();
    }

    private function fail($key, array $error, array $row)
    {

        $failures[] = new Failure($this->row_number, $key, $error, $row);
        throw new \Maatwebsite\Excel\Validators\ValidationException(
            \Illuminate\Validation\ValidationException::withMessages($error),
            $failures
        );
    }
}
