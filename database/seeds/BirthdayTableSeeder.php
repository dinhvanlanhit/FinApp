<?php

use Illuminate\Database\Seeder;

class BirthdayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('birthday')->insert(
            [
              [
                'idUser'=>1,
                'name' => 'Sinh Nhật Bạn A',
                'amount' => 250000,
                'date' => '2020-06-02',
                'address'=>'Huyện sơn ba'
              ],
              [
                'idUser'=>1,
                'name' => 'Sinh Nhật Bạn B',
                'amount' => 350000,
                'date' => '2020-06-02',
                'address'=>'Huyện Sơn Hạ'
              ]
              ,
              [
                'idUser'=>1,
                'name' => 'Sinh Nhật Bạn C',
                'amount' => 350000,
                'date' => '2020-06-02',
                'address'=>'Huyện Sơn Hạ'
              ]
              ,
              [
                'idUser'=>1,
                'name' => 'Sinh Nhật Bạn D',
                'amount' => 350000,
                'date' => '2020-06-02',
                'address'=>'Huyện Sơn Hạ'
              ]
            ]
        );
    }
}
