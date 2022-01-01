<?php

namespace App\Imports;

use App\Models\ProductDetails;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Validators\ValidationException;

class ProductDetailsImport implements ToModel,WithHeadingRow,WithValidation
{
    use Importable;
    private $row_number = 1;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $this->row_number++;

        return new ProductDetails([
            'stock' => $row['stock'],
            'color_id' => $row['color_id'],
            'size_id' => $row['size_id'],
            'product_id' => $row['product_id']
        ]);
    }

    public function rules(): array
    {
        return ProductDetails::sheetRules();
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
