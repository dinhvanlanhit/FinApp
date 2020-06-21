<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('idTypeDebt')->unsigned()->nullable();
            $table->foreign('idTypeDebt')->references('id')->on('type_debt')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->double('loan')->default(0)->nullable();
            $table->Integer('tenor')->nullable();
            $table->double('interest_rate')->default(0)->nullable();
            $table->string('address')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('debt');
    }
}
