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
                   'color'=>'#EA5455',
                ],
                [
                  'type_name' => 'Từ Tiền Lãi',
                  'color'=>'#9F44D3',
                ],
                [
                  'type_name' => 'Tiền Thưởng',
                 'color'=>'#ffc107',
                ],
                [
                  'type_name' => 'Vay Mượn',
                 'color'=>'#dc3545',
                ],
                [
                    'type_name' => 'Mục Khác',
                   'color'=>'#16A085',
                ],
              ]
            );
    }
}
