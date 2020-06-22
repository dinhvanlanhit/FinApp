<?php

use Illuminate\Database\Seeder;

class WalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallet')->insert(
            [
                [
                  'idUser'=>1,
                  'name' => 'TÀI KHOẢN AGRIBANK',
                  'amount'=>500000000,
                  'note'=>'Tập Xạo Lờ'
                ],
                [
                    'idUser'=>1,
                    'name' => 'TIỀN MẶT',
                    'amount'=>100000000,
                    'note'=>'Tập Xạo Lờ'
                ],
            ]
        );
    }
}
