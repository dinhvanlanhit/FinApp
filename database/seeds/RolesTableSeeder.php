<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                [ 
                    'name' => 'CHỦ TỊCH',
                    "note"=>"CHỦ TỊCH",
                    'permission'=>'["dashboard_view","users_view","users_insert","users_update","users_delete","payment_view","payment_insert","payment_update","payment_delete","contact_view","contact_delete","contact_status","users_admin_view","users_admin_insert","users_admin_update","users_admin_delete","roles_view","roles_insert","roles_update","roles_delete","setting_view","setting_update"]'
                ]
            ]);
    }
}
