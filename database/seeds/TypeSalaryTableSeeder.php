<?php

use Illuminate\Database\Seeder;

class TypeSalaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_salary')->insert(
            [
                [
                  'type_name' => 'Tiền Lương',
                 
                ],
                [
                    'type_name' => 'Bán Hàng Online',
                   
                ],
                [
                    'type_name' => 'Mục Khác',
                   
                ],
              ]
            );
    }
}
