<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchants')->insert([

            [
                'merchant_name' => 'Matahari',
                'merchant_address' => 'Jl Kebon Jeruk 1',
                'merchant_contact' => '087888583130'
            ],
            [
                'merchant_name' => 'Krama Yudha Berlian',
                'merchant_address' => 'Jl Poris Indah',
                'merchant_contact' => '0878123434'
            ],
            [
                'merchant_name' => 'Sogo Department Store',
                'merchant_address' => 'Taman Anggrek Mall',
                'merchant_contact' => '08782342340'
            ],

        ]);
    }
}
