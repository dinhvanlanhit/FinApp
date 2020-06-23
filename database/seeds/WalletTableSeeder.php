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
                  'idTypeWallet'=>2,
                  'name' => 'TÀI KHOẢN AGRIBANK',
                  'amount'=>300000000,
                  'note'=>''
                ],
                [
                    'idUser'=>1,
                    'idTypeWallet'=>1,
                    'name' => 'TIỀN MẶT',
                    'amount'=>100000000,
                    
                    'note'=>''
                ],
            ]
        );
    }
}
