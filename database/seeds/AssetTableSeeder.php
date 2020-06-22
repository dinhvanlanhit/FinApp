<?php

use Illuminate\Database\Seeder;

class AssetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset')->insert(
            [
                [
                  'idUser'=>1,
                  'idTypeAsset'=>1,
                  'name' => 'Đất 1',
                  'amount' => 25000000,
                  'address'=>'Đà Lạt',
                  'note'=>'Huyện sơn ba'
                ],
            ]
            );
    }
}
