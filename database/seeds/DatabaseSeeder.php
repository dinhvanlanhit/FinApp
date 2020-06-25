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
            TypeWalletTableSeeder::class,
            WalletTableSeeder::class,
            TypeEventTableSeeder::class,
            EventTableSeeder::class,
            TypeCostTableSeeder::class,
            CostTableSeeder::class,
            TypeShoppingTableSeeder::class,
            ShoppingTableSeeder::class,
            TypeSalaryTableSeeder::class,
            SalaryTableSeeder::class,
            TypeDebtTableSeeder::class,
            DebtTableSeeder::class,
            LendloanTableSeeder::class,
            InvestTableSeeder::class,
            Goals_dreamsTableSeeder::class,
            AssetTypeTableSeeder::class,
            AssetTableSeeder::class,
            GroupMyEventTableSeeder::class,
            MyEventTableSeeder::class,
            UsePayMentTableSeeder::class
        ]);
    }
}
