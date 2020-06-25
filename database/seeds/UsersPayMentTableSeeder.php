<?php

use Illuminate\Database\Seeder;

class UsersPayMentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_payment')->insert([
            [
                'idUser'=>1,
                'idUsePayment'=>1,
                'numberMonth'=>12,
                'amount'=>0,
                'created_at'=>date('Y-m-d H:s:i'),
                'updated_at'=>date('Y-m-d H:s:i')
            ],
            [
                'idUser'=>1,
                'idUsePayment'=>2,
                'numberMonth'=>3,
                'amount'=>200000,
                'created_at'=>date('Y-m-d H:s:i'),
                'updated_at'=>date('Y-m-d H:s:i')
            ]
            
        ]);
    }
}
