<?php

use Illuminate\Database\Seeder;

class Installment_purchase_details_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('installment_purchase_details')->insert(
            [
              [
                'idUser'=>1,
                'idInstallment_purchase'=>1,
                'payment'=>2500000,
                'date_payment'=>"2020-01-01",
              ]
            ]
        );
    }
}
