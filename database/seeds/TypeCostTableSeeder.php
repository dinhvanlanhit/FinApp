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
          'color'=>'#0396FF',
         
        ],
        [
            'type_name' => 'Tiền Ăn',
            'color'=>'#BA5666',
           
        ],
        [
          'type_name' => 'Bạn Gái',
          'color'=>'#AA5777',
         
        ],
        [
          'type_name' => 'Nhậu Nhặt',
          'color'=>'#EA5455',
        ],
        [
          'type_name' => 'Tiền Điện',
          'color'=>'#7367F0',
         
        ],
        [
          'type_name' => 'Tiền Nươc',
          'color'=>'#32CCBC',
          
        ],
        [
          'type_name' => 'Tiền Xăng',
          'color'=>'#28C76F',
         
        ],
        [
          'type_name' => 'Đóng Tiền Lãi',
          'color'=>'#9F44D3',
         
        ]
        ,
        [
          'type_name' => 'Học Phí Cho Con',
          'color'=>'#ffc107',
        ],
        [
          'type_name' => 'Đau Ốm',
          'color'=>'#002661',
        ]
        ,
        [
          'type_name' => 'Phát Sinh Khác',
          'color'=>'#dc3545',
        ]
      ]
    );
    }
}
