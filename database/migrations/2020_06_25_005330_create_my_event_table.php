<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('idWallet')->unsigned()->nullable();
            $table->foreign('idWallet')->references('id')->on('wallet')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('idGroupMyEvent')->unsigned()->nullable();
            $table->foreign('idGroupMyEvent')->references('id')->on('group_my_event')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->double('amount')->default(0)->nullable();
            $table->text('address')->nullable();
            $table->text('note')->nullable();
            $table->date('date')->nullable();
            $table->Integer('status')->default(0)->nullable();
            $table->string('status_name')->nullable();
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
        Schema::dropIfExists('my_event');
    }
}
