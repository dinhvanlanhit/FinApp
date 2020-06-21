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
              'idTypeDebt'=>1,
              'name' => 'AGRIBANK',
              'address'=>'Huyện sơn ba',
              'loan' => 200000000,
              'tenor'=>12,
              'interest_rate'=>2000000,
              'date'=>'2020-06-02',
              'expiration_date'=>'2021-6-10',
              'note'=>'Hệ Thống Đang Test'
             
            ],
            [
                'idUser'=>1,
                'idTypeDebt'=>1,
                'name' => 'AGRIBANK',
                'address'=>'Huyện sơn ba',
                'loan' => 200000000,
                'tenor'=>12,
                'interest_rate'=>2000000,
                'date'=>'2020-06-02',
                'expiration_date'=>'2021-6-10',
                'note'=>'Hệ Thống Đang Test'
               
            ],
            
        ]);
    }
}
