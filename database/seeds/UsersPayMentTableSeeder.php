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
                'numberMonth'=>0,
                'amount'=>0,
            ],
            [
                'idUser'=>1,
                'idUsePayment'=>1,
                'numberMonth'=>0,
                'amount'=>0,
            ]
            
        ]);
    }
}
