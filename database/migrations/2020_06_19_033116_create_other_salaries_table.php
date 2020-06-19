<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->double('amount')->default(0)->nullable();
            $table->string('address')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('other_salaries');
    }
}
