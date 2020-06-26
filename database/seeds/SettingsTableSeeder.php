<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                  'company_name'=>'Fin App',
                  'title'=>'Fin - App',
                  'logo'=>'logofinapp.png',
                  'icon' => 'logofinapp.png',
                  'googleMap'=>'',
                  'address' => '138  Lý Nam Đế  - Thành Phố Đà Lạt',
                  'email'=>'finapp.fun@gmail.com',
                  'password'=>'0966334404',
                  'phone_number'=>'0966334404',
                  'date'=>'2020-6-10',
                  'themes'=>'[]',
                  'content_banktransfer'=>'Demo',
                  'content_contact'=>'Demo'
            ]);
    }
}
