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
                    'permission'=>'["view","view","insert","update","delete","payment","view","delete","status","view","insert","update","delete","view","insert","update","delete"]'
                ]
            ]);
    }
}
