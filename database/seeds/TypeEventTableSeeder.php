<?php

use Illuminate\Database\Seeder;

class TypeEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_event')->insert(
            [
                [
                  'type_name' => 'Đám cưới',
                  'color'=>'#32CCBC'
                ],
                [
                    'type_name' => 'Đám Hỏi',
                    'color'=>'#28C76F'

                ],
                [
                  'type_name' => 'Sinh Nhật',
                  'color'=>'#9F44D3'
                ],
                [
                  'type_name' => 'Đám Dỗ',
                  'color'=>'#002661'
                ],
                [
                  'type_name' => 'Đám Ma',
                  'color'=>'#0396FF'
                ]
                ,
                [
                  'type_name' => 'Mục Khác',
                  'color'=>'#CA26FF'
                ]
              ]
            );
    }
}
