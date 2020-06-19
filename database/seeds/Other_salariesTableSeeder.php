<?php

use Illuminate\Database\Seeder;

class Other_salariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('other_salaries')->insert(
            [
                [
                    'idUser'=>1,
                    'name' => 'Dự Án Hệ Thống Quản Lý Nội Thất',
                    'amount' => 20000000,
                    "note"=>"Làm Dự Án",
                    'date' => '2020-01-06',
                    'address'=>'Huyện sơn ba'
                  ]
            ]);
        
              
    }
    
}
