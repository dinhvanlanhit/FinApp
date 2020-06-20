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
                "amount"=>60000000,
                'prepay' => 30000000,
                'number_months' => 12,
                "month_paid"=> 0,
                'monthly_amount_to_pay'=>2500000,
                'paid'=>0,
                'debt'=>30000000,
                'date'=>"2020-01-01",
                'expiration_date'=>"2020-12-31",
                'paymentDetals'=>"[]",
              ],
              [
                'idUser'=>1,
                'name' => 'Mua Xe Winner 150',
                "amount"=>60000000,
                'prepay' => 30000000,
                'number_months' => 12,
                "month_paid"=> 0,
                'monthly_amount_to_pay'=>2500000,
                'paid'=>0,
                'debt'=>30000000,
                'date'=>"2020-01-01",
                'expiration_date'=>"2020-12-31",
                'paymentDetals'=>"[]",
              ],

            ]
        );
    }
}
