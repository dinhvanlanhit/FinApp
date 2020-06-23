<?php

use Illuminate\Database\Seeder;

class TypeWalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_wallet')->insert(
            [
                [
                  'type_name' => 'Tiền Mặt',
                  'color'=>'#32CCBC'
                ],
                [
                    'type_name' => 'Tài Khoản Ngân Hàng',
                    'color'=>'#28C76F'

                ],
                [
                  'type_name' => 'Thẻ Tín Dụng',
                  'color'=>'#ffc107'
                ],
                [
                  'type_name' => 'Tài Khoản Đầu Tư',
                  'color'=>'#002661'
                ],
                [
                  'type_name' => 'Khác',
                  'color'=>'#0396FF'
                ]
              ]
            );
    }
}
