<?php

use Illuminate\Database\Seeder;

class ShoppingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shopping')->insert(
            [
              [
                'idUser'=>1,
                'name' => 'Mua Dày',
                'amount' => 250000,
                'date' => '2020-06-02',
                'address'=>'Huyện sơn ba'
              ],
              [
                'idUser'=>1,
                'name' => 'Mua Dếp',
                'amount' => 350000,
                'date' => '2020-06-02',
                'address'=>'Huyện Sơn Hạ'
              ]
              ,
              [
                'idUser'=>1,
                'name' => 'Mua xe máy',
                'amount' => 350000,
                'date' => '2020-06-02',
                'address'=>'Huyện Sơn Hạ'
              ]
              ,
              [
                'idUser'=>1,
                'name' => 'Mua ô tô',
                'amount' => 350000,
                'date' => '2020-06-02',
                'address'=>'Huyện Sơn Hạ'
              ]
            ]
        );
    }
}
