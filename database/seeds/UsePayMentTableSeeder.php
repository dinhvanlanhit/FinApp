<?php

use Illuminate\Database\Seeder;

class UsePayMentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('use_payment')->insert([
            [
               
                'name'=>'Sử dụng thử',
                'numberMonth'=>3,
                'note'=>'Sử dụng thử 3 Tháng',
                'amount'=>0,
            ],
            [
               
                'name'=>'Gói 3 Tháng',
                'numberMonth'=>3,
                'note'=>'Sử Dụng  3 Tháng',
                'amount'=>150000,
            ],
            [
               
                'name'=>'Gói 6 Tháng',
                'numberMonth'=>6,
                'note'=>'Sử Dụng 6 Tháng',
                'amount'=>300000,
            ],
            [
                
                'name'=>'Gói 1 Năm',
                'numberMonth'=>12,
                'note'=>'Sử Dụng 12 Tháng',
                'amount'=>600000,
            ],
            [
              
                'name'=>'Gói 2 Năm',
                'numberMonth'=>24,
                'note'=>'Sử Dụng 2 Năm',
                'amount'=>1200000,
            ]
        ]);
    }
}
