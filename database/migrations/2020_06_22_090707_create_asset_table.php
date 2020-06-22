<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('idTypeAsset')->unsigned()->nullable();
            $table->foreign('idTypeAsset')->references('id')->on('type_asset')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->double('amount')->default(0)->nullable();// Số tiền đầu tư
            $table->text('note')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('asset');
    }
}
