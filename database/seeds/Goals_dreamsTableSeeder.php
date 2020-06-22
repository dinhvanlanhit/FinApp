<?php

use Illuminate\Database\Seeder;

class Goals_dreamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals_dreams')->insert(
            [
                [
                  'idUser'=>1,
                  'type'=>'Đang Thực Hiện',
                  'name' => 'Mua Xe Hơi',
                  'note'=>'Tập Xạo Lờ',
                  'dateBegin'=>'2020-06-01',
                  'dateEnd'=>'2025-06-25'
                ],
                [
                    'idUser'=>1,
                    'type'=>'Chưa Làm Được',
                    'name' => 'Mua Xe Nhà ',
                    'note'=>'Tập Xạo Lờ',
                    'dateBegin'=>'2020-06-01',
                    'dateEnd'=>'2025-06-25'
                ],
                [
                    'idUser'=>1,
                    'type'=>'Đã Làm Được',
                    'name' => 'Mua Xe Đất ',
                    'note'=>'Tập Xạo Lờ',
                    'dateBegin'=>'2020-06-01',
                    'dateEnd'=>'2025-06-25'
                ],
            ]);
    }
}
