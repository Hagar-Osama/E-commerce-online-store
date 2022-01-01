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
use Maatwebsite\Excel\Validators\ValidationException;

class ProductImport implements ToModel,WithHeadingRow,WithValidation
{
    use Importable;
    private $row_number = 1;

    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        //dd($row['description']);
        $this->row_number++;

        if($row['price'] < 50)
        {
            $error = ['price' => 'Price Less Than 100'];
            return $this->fail('price', $error, $row);
        }

        $product = Product::create([
            'description' => $row['description'],
            'price' => $row['price'],
            'sub_category_id' => $row['sub_category_id']
        ]);
        $langs = Lang::get();
        foreach ($langs as $lang){
            ProductName::create([
                'product_id' => $product->id,
                'lang_id' => $lang->id,
                'name' => $row['name_'.$lang->name]
            ]);
        }
        return $product;
    }

    public function rules(): array
    {
        return Product::SheetRule();
    }

    /**
     * Fail import
     *
     * @param $key
     * @param $error
     * @param $row
     * @throws ValidationException
     */
    public function fail($key, $error, $row) {
        $failures[] = new Failure($this->row_number, $key, $error, $row);
        throw new \Maatwebsite\Excel\Validators\ValidationException(
            \Illuminate\Validation\ValidationException::withMessages($error),
            $failures
        );
    }
}
