<?php

use Illuminate\Database\Seeder;

class MyEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_event')->insert([
            [
                'idUser'=>1,
                'idWallet'=>2,
                'idGroupMyEvent' => 1,
                'name'=>'Đinh Thị C',
                'amount' => 250000,
                'date' => date('Y-m-d'),
                'note'=>'',
                'address'=>'Sơn Hạ',
                'status'=>1,
                'status_name'=>'Còn Nợ'
            ],
            [
                'idUser'=>1,
                'idWallet'=>2,
                'idGroupMyEvent' => 1,
                'name'=>'Đinh Thị B',
                'amount' => 250000,
                'date' => date('Y-m-d'),
                'note'=>'',
                'address'=>'Sơn Hạ',
                'status'=>1,
                'status_name'=>'Còn Nợ'
            ],
            [
                'idUser'=>1,
                'idWallet'=>2,
                'idGroupMyEvent' => 1,
                'name'=>'Đinh Thị A',
                'amount' => 250000,
                'date' => date('Y-m-d'),
                'note'=>'',
                'address'=>'Thành Phố Quảng Ngãi',
                'status'=>1,
                'status_name'=>'Còn Nợ'
            ],
        ]);
    }
}
