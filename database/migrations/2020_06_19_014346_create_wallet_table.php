<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('idTypeWallet')->unsigned()->nullable();
            $table->foreign('idTypeWallet')->references('id')->on('type_wallet')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->double('amount')->default(0)->nullable();// Số tiền đầu tư
            $table->text('note')->nullable();
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
        Schema::dropIfExists('wallet');
    }
}
