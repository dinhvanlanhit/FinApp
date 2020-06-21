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
            TypeEventTableSeeder::class,
            EventTableSeeder::class,
            TypeCostTableSeeder::class,
            CostTableSeeder::class,
            TypeShoppingTableSeeder::class,
            ShoppingTableSeeder::class,
            TypeSalaryTableSeeder::class,
            SalaryTableSeeder::class,
            TypeDebtTableSeeder::class,
            DebtTableSeeder::class
           
        ]);
    }
}
