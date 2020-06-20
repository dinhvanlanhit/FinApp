<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherDebtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_debt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
            $table->string('bank_name')->nullable();
            $table->double('loan')->default(0)->nullable();
            $table->integer('tenor')->nullable();
            $table->double('interest_rate')->default(0)->nullable();
            $table->integer('remaining_month')->nullable();
            $table->double('paid')->default(0)->nullable();
            $table->double('debt')->default(0)->nullable();
            $table->date('date')->nullable();
            $table->date('expiration_date')->nullable();
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
        Schema::dropIfExists('other_debt');
    }
}
