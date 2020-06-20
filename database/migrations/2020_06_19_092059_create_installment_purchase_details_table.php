<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentPurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_purchase_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
            $table->bigInteger('idInstallment_purchase')->unsigned()->nullable()->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('idInstallment_purchase')->references('id')->on('installment_purchase')->onDelete('cascade')->onUpdate('cascade');;
            
            $table->integer('moth')->nullable();
            $table->double('payment')->default(0)->nullable();
          
            $table->date('date_payment')->nullable();
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
        Schema::dropIfExists('installment_purchase_details');
    }
}
