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
                  'des' => 250000,
                ],
                [
                    'type_name' => 'Đám Hỏi',
                    'des' => 250000,
                ],
                [
                  'type_name' => 'Sinh Nhật',
                  'des' => 'Sinh Nhật Bạn Bè',
                ],
                [
                  'type_name' => 'Đám Dỗ',
                  'des' => '',
                ],
                [
                  'type_name' => 'Đám Ma',
                  'des' => '',
                ]
                ,
                [
                  'type_name' => 'Mục Khác',
                  'des' => '',
                ]
              ]
            );
    }
}
