<?php

use Illuminate\Database\Seeder;

class DebtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('debt')->insert(
        [
            [
              'idUser'=>1,
              'bank_name' => 'AGRIBANK',
              'loan' => 200000000,
              'tenor'=>12,
              'interest_rate'=>2000000,
              'remaining_month'=>6,
              'paid'=>100000000, 
              'debt'=>100000000,     
              'date' => '2020-06-02',
              'address'=>'Huyện sơn ba'
            ],
            
        ]);
    }
}
