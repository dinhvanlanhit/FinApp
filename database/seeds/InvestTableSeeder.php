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
                  'name' => 'Đinh Thị A',
                  'birthday'=>'1989-02-02',
                  'sex'=>1,
                  'address'=>'Sơn Hạ - Sơn Hà - TP Quảng Ngãi',
                  'loan' => 200000000,
                  'tenor'=>12,
                  'interest_rate'=>2000000,
                  'mortgage'=>'Sổ Đỏ',
                  'date'=>'2020-06-02',
                  'expiration_date'=>'2021-6-10',
                  'note'=>'Hệ Thống Đang Test'
                ],
                [
                    'idUser'=>1,
                    'name' => 'Đinh Văn A',
                    'birthday'=>'1989-02-02',
                    'sex'=>0,
                    'address'=>'Sơn Hạ - Sơn Hà - TP Quảng Ngãi',
                    'loan' => 200000000,
                    'tenor'=>12,
                    'interest_rate'=>2000000,
                    'mortgage'=>'Sổ Đỏ',
                    'date'=>'2020-06-02',
                    'expiration_date'=>'2021-6-10',
                    'note'=>'Hệ Thống Đang Test'
                  ]
            ]);
    }
}
