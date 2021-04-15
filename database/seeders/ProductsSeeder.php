<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Cheetos',
                'product_sku' => 'ABC123',
                'product_qty' => '10'
            ],
            [
                'product_name' => 'Taro',
                'product_sku' => 'DEF456',
                'product_qty' => '20'
            ],
            [
                'product_name' => 'Doritos',
                'product_sku' => 'GHI789',
                'product_qty' => '30'
            ],

        ]);
    }
}
