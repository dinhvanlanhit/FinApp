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
                
                'idUsePaymet'=>1,
                'name'=>'Miễn Phí',
                'numberMoth'=>0,
                'note'=>'Sử dụng miễn phí',
                'amount'=>0,
            ],
            [
                'idUsePaymet'=>1,
                'name'=>'Sử dụng thử',
                'numberMoth'=>3,
                'note'=>'Sử dụng thử 3 Tháng',
                'amount'=>0,
            ],
            [
                'idUsePaymet'=>1,
                'name'=>'Gói 3 Tháng',
                'numberMoth'=>3,
                'note'=>'Sử Dụng  3 Tháng',
                'amount'=>200000,
            ],
            [
                'idUsePaymet'=>1,
                'name'=>'Gói 6 Tháng',
                'numberMoth'=>6,
                'note'=>'Sử Dụng 6 Tháng',
                'amount'=>400000,
            ],
            [
                'idUsePaymet'=>1,
                'name'=>'Gói 1 Năm',
                'numberMoth'=>12,
                'note'=>'Sử Dụng 12 Tháng',
                'amount'=>800000,
            ],
            [
                'idUsePaymet'=>1,
                'name'=>'Gói 2 Năm',
                'numberMoth'=>24,
                'note'=>'Sử Dụng 2 Năm',
                'amount'=>1600000,
            ]
        ]);
    }
}
