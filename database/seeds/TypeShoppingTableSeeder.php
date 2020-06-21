<?php

use Illuminate\Database\Seeder;

class TypeShoppingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_shopping')->insert(
            [
                [
                  'type_name' => 'Mua Giày Dếp',
                  'color'=>'#0396FF',
                 
                ],
                [
                    'type_name' => 'Mua Quần Áo',
                    'color'=>'#EA5455',
                   
                ],
                [
                  'type_name' => 'Mua Mỹ Phẩm',
                  'color'=>'#7367F0',
                 
                ],
                [
                    'type_name' => 'Mua Linh Tinh',
                    'color'=>'#32CCBC',
                    
                ],
                [
                    'type_name' => 'Mục Khác',
                    'color'=>'#28C76F',
                   
                ],
              ]
            );
    }
}
