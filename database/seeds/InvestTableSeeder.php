<?php

use Illuminate\Database\Seeder;

class InvestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invest')->insert(
            [
                [
                  'idUser'=>1,
                  'name' => 'Bán Hàng Online Mý Phẩm',
                  'amount' => 200000000,
                  'note'=>'Đâu Tư Mỹ Phẩm',
                  'address'=>'Sơn Hạ - Sơn Hà - TP Quảng Ngãi',
                  'date'=>'2020-06-22'
                ],
                [
                  'idUser'=>1,
                  'name' => 'Bán Hàng Online Lấy Sĩ Áo',
                  'amount' => 200000000,
                  'note'=>'Quần Áo',
                  'address'=>'Sơn Hạ - Sơn Hà - TP Quảng Ngãi',
                  'date'=>'2020-06-22'
                ]
                
            ]);
    }
}
