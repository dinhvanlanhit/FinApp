<?php

use Illuminate\Database\Seeder;

class AssetTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_asset')->insert(
            [
                [
                  'type_name' => 'Đất',
                  'color'=>'#0396FF',
                ],
                [
                  'type_name' => 'Xe Cộ',
                  'color'=>'#EA5455',
                ],
                [
                  'type_name' => 'Thiết Bị',
                  'color'=>'#7367F0',
                 
                ],
                [
                  'type_name' => 'Vàng',
                  'color'=>'#32CCBC',
                  
                ],
                [
                  'type_name' => 'Bạc',
                  'color'=>'#28C76F',
                 
                ],
                [
                  'type_name' => 'Kim Cương',
                  'color'=>'#9F44D3',
                ]
              ]
            );
    }
}
