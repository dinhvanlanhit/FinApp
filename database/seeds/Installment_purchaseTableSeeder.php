<?php

use Illuminate\Database\Seeder;

class Installment_purchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('installment_purchase')->insert(
            [
              [
                'idUser'=>1,
                'name' => 'Mua Xe Exciter 150',
                "amount"=>55000000,
                'number_months' => 12,
                "remaining_month"=> 5,
                'monthly_amount_to_pay'=>2000000,
                'prepay' => 25000000,
                'paid'=>10000000,
                'debt'=>15000000,
                'date'=>"2020-01-01",
                'expiration_date'=>"2020-12-31",
                'paymentDetals'=>"[]",
              ],
              [
                'idUser'=>1,
                'name' => 'Mua Xe Winner 150',
                "amount"=>55000000,
                'number_months' => 12,
                "remaining_month"=> 5,
                'monthly_amount_to_pay'=>2000000,
                'prepay' => 25000000,
                'paid'=>10000000,
                'debt'=>15000000,
                'date'=>"2020-01-01",
                'expiration_date'=>"2020-12-31",
                'paymentDetals'=>"[]",
              ],

            ]
        );
    }
}
