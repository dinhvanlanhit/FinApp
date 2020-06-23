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
                'idWallet'=>1,
                'name' => 'Mua Giày',
                'amount' => 800000,
                'date' => '2020-06-01',
                'note'=>'Mua Trên Shoppe',
                'idTypeShopping'=>1,
              ],
              [
                'idUser'=>1,
                'idWallet'=>1,
                'name' => 'Mua Hệ Thống Hosting',
                'amount' => 900000,
                'date' => '2020-06-03',
                'note'=>'Mua Của Hostinger',
                'idTypeShopping'=>5,
              ]
              ,
              [
                'idUser'=>1,
                'idWallet'=>1,
                'name' => 'Mua Quần Lửng',
                'amount' => 250000,
                'idWallet'=>1,
                'date' => '2020-06-06',
                'note'=>'Mua Của Shop Ở Đà Lạt',
                'idTypeShopping'=>2,
              ]
              
            ]
        );
    }
}
