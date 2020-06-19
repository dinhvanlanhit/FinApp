<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_purchase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->double('amount')->default(0)->nullable();
            $table->integer('number_months')->nullable();
            $table->integer('remaining_month')->nullable();
            $table->double('monthly_amount_to_pay')->default(0)->nullable();
            $table->double('prepay')->default(0)->nullable();
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
        Schema::dropIfExists('installment_purchase');
    }
}
