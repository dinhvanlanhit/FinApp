<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
        
                $table->bigIncrements('id');
                $table->bigInteger('idUser')->unsigned()->nullable();
                $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->bigInteger('idTypeEvent')->unsigned()->nullable();
                $table->foreign('idTypeEvent')->references('id')->on('type_event')->onDelete('cascade')->onUpdate('cascade');
                $table->bigInteger('idWallet')->unsigned()->nullable();
                $table->foreign('idWallet')->references('id')->on('wallet')->onUpdate('cascade');


                $table->string('name')->nullable();
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
        Schema::dropIfExists('event');
    }
}
