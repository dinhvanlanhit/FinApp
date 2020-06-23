<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost', function (Blueprint $table) {
            $table->bigIncrements('id');
                $table->bigInteger('idUser')->unsigned()->nullable();
                $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                
                $table->bigInteger('idTypeCost')->unsigned()->nullable();
                $table->foreign('idTypeCost')->references('id')->on('type_cost')->onDelete('cascade')->onUpdate('cascade');

                $table->bigInteger('idWallet')->unsigned()->nullable();
                $table->foreign('idWallet')->references('id')->on('wallet')->onDelete('cascade')->onUpdate('cascade');

                $table->string('note')->nullable();
                $table->double('amount')->default(0)->nullable();
                $table->string('address')->nullable();
                $table->date('date')->nullable();
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
        Schema::dropIfExists('cost');
    }
}
