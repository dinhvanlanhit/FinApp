<?php

use Illuminate\Database\Seeder;

class TypeDebtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_debt')->insert(
            [
                [
                  'type_name' => 'Ngân Hàng',
                  'color'=>'#32CCBC'
                ],
                [
                    'type_name' => 'Nợ Khác',
                    'color'=>'#28C76F'

                ]
              ]
            );
    }
}
