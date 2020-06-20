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
                  'color'=>'#08AEEA',
                 
                ],
                [
                    'type_name' => 'Bán Hàng Online',
                   'color'=>'#B721FF',
                ],
                [
                    'type_name' => 'Mục Khác',
                   'color'=>'#16A085',
                ],
              ]
            );
    }
}
