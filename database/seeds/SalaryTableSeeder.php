<?php

use Illuminate\Database\Seeder;

class SalaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salary')->insert(
            [
              [
                'idUser'=>1,
                'name' => 'Công Ty Am Note',
                'amount' => 10000000,
                "note"=>"Lương tháng : 01 Năm 2020",
                'date' => '2020-01-06',
                'address'=>'Huyện sơn ba'
              ],
              [
                'idUser'=>1,
                'name' => 'Công Ty Am Note',
                'amount' => 10000000,
                "note"=>"Lương tháng : 02 Năm 2020",
                'date' => '2020-02-06',
                'address'=>'Huyện sơn ba'
              ]
              ,
              [
                'idUser'=>1,
                'name' => 'Công Ty Am Note',
                'amount' => 10000000,
                "note"=>"Lương tháng : 03 Năm 2020",
                'date' => '2020-03-06',
                'address'=>'Huyện sơn ba'
              ]
              ,
              [
                'idUser'=>1,
                'name' => 'Công Ty Am Note',
                'amount' => 10000000,
                "note"=>"Lương tháng : 04 Năm 2020",
                'date' => '2020-04-06',
                'address'=>'Huyện sơn ba'
              ],
              
              [
                'idUser'=>1,
                'name' => 'Công Ty Am Note',
                'amount' => 10000000,
                "note"=>"Lương tháng : 05 Năm 2020",
                'date' => '2020-05-06',
                'address'=>'Huyện sơn ba'
              ],
              [
                'idUser'=>1,
                'name' => 'Công Ty Am Note',
                'amount' => 10000000,
                "note"=>"Lương tháng : 06 Năm 2020",
                'date' => '2020-06-06',
                'address'=>'Huyện sơn ba'
              ]
            ]
        );
    }
}
