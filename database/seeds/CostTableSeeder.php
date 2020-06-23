<?php

use Illuminate\Database\Seeder;

class CostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cost')->insert(
            [
                [
                  'idUser'=>1,
                  'idTypeCost'=>1,
                  'idWallet'=>1,
                  'note' => 'Đóng Tiền Nhà Trọ',
                  'amount' => 2000000,
                  'date' => '2020-06-10',
                  
                ],
                [
                    'idUser'=>1,
                    'idTypeCost'=>2,
                    'idWallet'=>1,
                    'note' => 'Tiền Ăn Hàng Tháng',
                    'amount' => 2000000,
                    'date' => '2020-06-10',
                    
                ],
    
            ]
            );
    }
}