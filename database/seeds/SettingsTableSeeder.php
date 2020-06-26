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
                  'icon' => 'icon.jpg',
                  'googleMap'=>'<iframe width="100%" height="250" style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1951.5707501119275!2d108.4395018081761!3d11.964703521821205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1593161745604!5m2!1svi!2s" frameborder="0" allowfullscreen="allowfullscreen" aria-hidden="false" tabindex="0"></iframe>',
                  'address' => '138  Lý Nam Đế  - Thành Phố Đà Lạt',
                  'email'=>'finapp.fun@gmail.com',
                  'password'=>'0966334404',
                  'phone_number'=>'0966334404',
                  'date'=>'2020-6-10',
                  'themes'=>'[]',
                  'content_banktransfer'=>'',
                  'content_contact'=>'',
                  'code_fanpage'=>'',
       
                 
            ]);
    }
}
