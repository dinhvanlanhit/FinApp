<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendloanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lendloan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->date('birthday')->nullable();
            $table->Integer('sex')->nullable();
            $table->double('loan')->default(0)->nullable();
            $table->Integer('tenor')->nullable();
            $table->double('interest_rate')->default(0)->nullable();
            $table->date('date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->text('address')->nullable();
            $table->text('mortgage')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lendloan');
    }
}
