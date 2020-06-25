<?php

use Illuminate\Database\Seeder;

class MyEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_event')->insert([
            [
                'idUser'=>1,
                'idTypeEvent'=>1,
                'idWallet'=>2,
                'idGroupMyEvent' => 1,
                'amount' => 250000,
                'date' => date('Y-m-d'),
                'note'=>''
            ],
            [
                'idUser'=>1,
                'idTypeEvent'=>1,
                'idWallet'=>2,
                'idGroupMyEvent' => 1,
                'amount' => 250000,
                'date' => date('Y-m-d'),
                'note'=>''
            ],
            [
                'idUser'=>1,
                'idTypeEvent'=>1,
                'idWallet'=>2,
                'idGroupMyEvent' => 1,
                'amount' => 250000,
                'date' => date('Y-m-d'),
                'note'=>''
            ],
        ]);
    }
}
