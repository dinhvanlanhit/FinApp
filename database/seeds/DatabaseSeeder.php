<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            WeddingTableSeeder::class,
            BirthdayTableSeeder::class,
            ShoppingTableSeeder::class,
            Installment_purchaseTableSeeder::class,
            Installment_purchase_details_TableSeeder::class,
            SalaryTableSeeder::class,
            Other_salariesTableSeeder::class
        ]);
    }
}
