<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->string('title')->nullable();
            $table->text('logo')->nullable();
            $table->text('icon')->nullable();
            $table->text('googleMap')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('date')->nullable();
            $table->text('themes')->nullable();
            $table->text('content_banktransfer')->nullable();
            $table->text('content_contact')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
