<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'Công Ty AMNOTE',
                'idLang' => null,
                'phone' => '0966334404',
                'address' => '138 Lý Nam Đế -  Thành Phố Đà Lạt',
            ]
        ]);
    }
}
