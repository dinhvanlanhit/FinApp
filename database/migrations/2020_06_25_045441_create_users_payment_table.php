<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('idUsePayment')->unsigned()->nullable();
            $table->foreign('idUsePayment')->references('id')->on('use_payment')->onDelete('cascade')->onUpdate('cascade');
            $table->Integer('numberMonth')->nullable();
            $table->double('amount')->default(0)->nullable();// Số tiền đầu tư
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
        Schema::dropIfExists('users_payment');
    }
}
