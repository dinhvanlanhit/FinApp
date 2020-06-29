<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('contact')->insert([
            [
                'idUser'=>2,
                'email'=>'dinhthinamsha@gmail.com',
                'full_name'=>'Đinh Thị Nam',
                'phone_number'=>'0966334404',
                'msg'=>'Tôi không biết thanh toán làm sao để thanh toán được',
                'created_at'=>date('Y-m-d h:s:i'),
                'status'=>0,
                'status_name'=>'Chưa Xử Lý'
            ]
        ]);
    }
}
