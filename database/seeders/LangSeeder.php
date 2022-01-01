<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Seeder;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = ['en', 'ar'];

        foreach ($langs as $lang){
            Lang::create([
                'name' => $lang
            ]);
        }
    }
}
