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
       $data =  DB::table('users')->insert([
            'idRoles'=>1,
            'idKey'=> '1'.RandomString(5),
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
            'type'=>'admin',
            'date'=>date('Y-m-d'),
            'status'=>0,
            'status_name'=>'Mở',
            'status_payment'=>0,
            'status_payment_name'=>'Miễn Phí',
        ]);
      
        // RandomString
        DB::table('users')->insert([
            'idKey'=> '2'.RandomString(5),
            'email' => 'dinhthinamsha@gmail.com',
            'password' => bcrypt('12345'),
            'avatar'=>null,
            'full_name'=>'Đinh Thị Năm',
            'english_name'=>'Đinh Thị Năm',
            'nickname'=>'Đinh Thị Năm',
            'working_day'=>'2020-12-02',
            'introduce'=>'Bán Mỹ Phẩm Bán Hàng Online',
            'birthday'=>'1996-12-02',
            'address_1'=>'Thôn Gò Sên - Xã Sơn Thành - Huyện Sơn Hà - Tỉnh Quảng Ngãi',
            'address_2'=>'Thôn Gò Sên - Xã Sơn Thành - Huyện Sơn Hà - Tỉnh Quảng Ngãi',
            'address_3'=>'Thôn Gò Sên - Xã Sơn Thành - Huyện Sơn Hà - Tỉnh Quảng Ngãi',
            'provincial'=>'Việt Nam',
            'city_name'=>'Quảng Ngãi',
            'phone_number'=>'0974000841',
            'mobile_number'=>'0974000841',
            'internal_number'=>'',
            'fax'=>'',
            'cmnn_passport'=>'',
            'postal_code'=>'',
            'type'=>'member',
            'date'=>date('Y-m-d'),
            'status'=>0,
            'status_name'=>'Mở',
            'status_payment'=>0,
            'status_payment_name'=>'Miễn Phí',
        ]);
        // $ABC = 'A';
        // for($i=10;$i<=20;$i++){
        //     $ABC++;
        //     DB::table('users')->insert([
        //         'email' => $i.'@gmail.com',
        //         'password' => bcrypt('12345'),
        //         'avatar'=>null,
        //         'full_name'=>'Đinh Văn '.$ABC,
        //         'english_name'=>'Admin Pro',
        //         'nickname'=>'Admin Pro',
        //         'working_day'=>'2020-12-02',
        //         'introduce'=>'Đam Mê Lập Trình',
        //         'birthday'=>'1996-12-02',
        //         'address_1'=>'Thôn KaTu - Xã Sơn Hạ - Huyện Sơn Hà - Tỉnh Quảng Ngãi',
        //         'address_2'=>'Thôn KaTu - Xã Sơn Hạ - Huyện Sơn Hà - Tỉnh Quảng Ngãi',
        //         'address_3'=>'Thôn KaTu - Xã Sơn Hạ - Huyện Sơn Hà - Tỉnh Quảng Ngãi',
        //         'provincial'=>'Việt Nam',
        //         'city_name'=>'Quảng Ngãi',
        //         'phone_number'=>'0966334404',
        //         'mobile_number'=>'0966334404',
        //         'internal_number'=>'0966334404',
        //         'fax'=>'0966334404',
        //         'cmnn_passport'=>'0966334404',
        //         'postal_code'=>'0966334404',
        //         'type'=>'member',
        //         'date'=>date('Y-m-d'),
        //         'status'=>0,
        //         'status_name'=>'Mở',
        //         'status_payment'=>1,
        //         'status_payment_name'=>'Trả Phí',
        //     ]);
           
        // }
       
    }
}
