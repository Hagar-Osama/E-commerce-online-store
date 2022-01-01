<?php

namespace Database\Seeders;

use App\Http\Traits\ColorsTrait;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    use ColorsTrait;
    public function run()
    {
        $Colors = [
            [
                'name'=>'Red',
                'code'=>'ff0'
            ],
            [
                'name'=>'Green',
                'code'=>'40ff00'
            ],
            [
                'name'=>'Blue',
                'code'=>'0040ff'
            ],
            [
                'name'=>'Black',
                'code'=>'000'
            ],
            [
                'name'=>'white',
                'code'=>'fff'
            ]
        ];
        foreach ($Colors as $value)
        {
            Color::create([
                'code'=>$value['code'],
                'name'=>$value['name']
            ]);
        }
        $this->setColorsDataToRedis();
    }
}
