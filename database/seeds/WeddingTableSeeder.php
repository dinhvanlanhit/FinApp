<?php

use Illuminate\Database\Seeder;

class WeddingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wedding')->insert(
            [
              [
                'idUser'=>1,
                'name' => 'Đám cưới Bé Nấm',
                'amount' => 250000,
                'date' => '2020-06-02',
                'address'=>'Huyện sơn ba'
              ],
              [
                'idUser'=>1,
                'name' => 'Đám cưới Em Lên',
                'amount' => 350000,
                'date' => '2020-06-02',
                'address'=>'Huyện Sơn Hạ'
              ]
            ]
        );
    }
}
