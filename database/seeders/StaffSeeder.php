<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
           [
               'staff_name' => 'Kenneth Halim',
               'staff_address' => 'Bojong Gede 48',
               'staff_contact' => '087888583867',
               'staff_gender' => 1
           ],
           [
               'staff_name' => 'William Chrisandy',
               'staff_address' => 'Poris Indah 99',
               'staff_contact' => '087578234131',
               'staff_gender' => 1
           ],
           [
               'staff_name' => 'Gregorius Albert',
               'staff_address' => 'Kebayoran Lama 18',
               'staff_contact' => '087888583221',
               'staff_gender' => 1
           ],

        ]);
    }
}
