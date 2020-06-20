<?php

use Illuminate\Database\Seeder;

class TypeCostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
DB::table('type_cost')->insert(
    [
        [
          'type_name' => 'Tiền Nhà',
         
        ],
        [
            'type_name' => 'Tiền Ăn',
           
        ],
        [
          'type_name' => 'Tiền Điện',
         
        ],
        [
          'type_name' => 'Tiền Nươc',
          
        ],
        [
          'type_name' => 'Tiền Xăng',
         
        ],
        [
          'type_name' => 'Đóng Tiền Lãi',
         
        ]
        ,
        [
          'type_name' => 'Học Phí Cho Con',
        ],
        [
          'type_name' => 'Đau Ốm',
        ]
        ,
        [
          'type_name' => 'Phát Sinh Khác',
        ]
      ]
    );
    }
}
