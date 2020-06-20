<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event')->insert(
        [
            [
              'idUser'=>1,
              'idTypeEvent'=>1,
              'name' => 'Đám cưới Bé Heo',
              'amount' => 250000,
              'date' => '2020-06-02',
              'address'=>'Huyện sơn ba'
            ],
            [
              'idUser'=>1,
              'idTypeEvent'=>1,
              'name' => 'Đám cưới Bé Chó',
              'amount' => 350000,
              'date' => '2020-06-02',
              'address'=>'Huyện Sơn Hạ'
            ],
            [
              'idUser'=>1,
              'idTypeEvent'=>1,
              'name' => 'Đám cưới Bé Mèo',
              'amount' => 350000,
              'date' => '2020-06-02',
              'address'=>'Huyện Sơn Hạ'
            ]
            ,
            [
              'idUser'=>1,
              'idTypeEvent'=>1,
              'name' => 'Đám cưới Bé Trâu',
              'amount' => 350000,
              'date' => '2020-06-02',
              'address'=>'Huyện Sơn Hạ'
            ]
            ,
            [
              'idUser'=>1,
              'idTypeEvent'=>1,
              'name' => 'Đám cưới Bé Gà',
              'amount' => 350000,
              'date' => '2020-06-02',
              'address'=>'Huyện Sơn Hạ'
            ]
          ]
        );
    }
}
