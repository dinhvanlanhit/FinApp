<?php

use Illuminate\Database\Seeder;

class SalaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salary')->insert(
            [
              [
                'idUser'=>1,
                'idTypeSalary'=>1,
                'company' => 'CÔNG TY AMNOTE',
                'amount' => 10000000,
                'name'=>'Đinh Văn Lệ',
              
                'date' => '2020-01-05'
                
              ],
              [
                'idUser'=>1,
                'idTypeSalary'=>1,
                'company' => 'CÔNG TY AMNOTE',
                'amount' => 10000000,
                'name'=>'Đinh Văn Lệ',
              
                'date' => '2020-02-05',
               
              ]
              ,
              [
                'idUser'=>1,
                'idTypeSalary'=>1,
                'company' => 'CÔNG TY AMNOTE',
                'amount' => 10000000,
                'name'=>'Đinh Văn Lệ',
              
                'date' => '2020-03-05',
               
              ]
              ,
              [
                'idUser'=>1,
                'idTypeSalary'=>1,
                'company' => 'CÔNG TY AMNOTE',
                'amount' => 10000000,
                'name'=>'Đinh Văn Lệ',
               
                'date' => '2020-04-05',
               
              ],
              
              [
                'idUser'=>1,
                'idTypeSalary'=>1,
                'company' => 'CÔNG TY AMNOTE',
                'amount' => 10000000,
                'name'=>'Đinh Văn Lệ',
               
                'date' => '2020-05-06',
              
              ],
              [
                'idUser'=>1,
                'idTypeSalary'=>1,
                'company' => 'CÔNG TY AMNOTE',
                'amount' => 10000000,
                'name'=>'Đinh Văn Lệ',
               
                'date' => '2020-06-05',
                
              ]
            ]
        );
    }
}
