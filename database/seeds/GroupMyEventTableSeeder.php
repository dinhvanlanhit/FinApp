<?php

use Illuminate\Database\Seeder;

class GroupMyEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_my_event')->insert([
            [
                'idUser'=>1,
                'group_name'=>'ĐÁM CON A',
                'note'=>'',
                'date'=>date('Y-m-d')
            ],
            [
                'idUser'=>1,
                'group_name'=>'ĐÁM CON B',
                'note'=>'',
                'date'=>date('Y-m-d')
            ],
            [
                'idUser'=>1,
                'group_name'=>'ĐÁM CON C',
                'note'=>'',
                'date'=>date('Y-m-d')
            ]
        ]);
    }
}
