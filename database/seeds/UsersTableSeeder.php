<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'dinhvanlanh.it@gmail.com',
            'password' => bcrypt('12345'),
            'avatar'=>null,
            'full_name'=>'Đinh Văn Lệ',
            'english_name'=>'Admin Pro',
            'nickname'=>'Admin Pro',
            'working_day'=>'2020-12-02',
            'introduce'=>'Đam Mê Lập Trình',
            'birthday'=>'1996-12-02',
            'address_1'=>'Thôn KaTu - Xã Sơn Hạ - Huyện Sơn Hà - Tỉnh Quảng Ngãi',
            'address_2'=>'Thôn KaTu - Xã Sơn Hạ - Huyện Sơn Hà - Tỉnh Quảng Ngãi',
            'address_3'=>'Thôn KaTu - Xã Sơn Hạ - Huyện Sơn Hà - Tỉnh Quảng Ngãi',
            'provincial'=>'Việt Nam',
            'city_name'=>'Quảng Ngãi',
            'phone_number'=>'0966334404',
            'mobile_number'=>'0966334404',
            'internal_number'=>'0966334404',
            'fax'=>'0966334404',
            'cmnn_passport'=>'0966334404',
            'postal_code'=>'0966334404',
            'type'=>'admin'
        ]);
    }
}
