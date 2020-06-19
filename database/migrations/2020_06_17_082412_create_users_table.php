<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_type')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->string('full_name')->nullable();
            $table->string('english_name')->nullable();
            $table->string('nickname')->nullable();
            $table->date('working_day')->nullable();
            $table->boolean('sex')->nullable()->default(true);
            $table->longText('introduce')->nullable();
            $table->date('birthday')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('provincial')->nullable();
            $table->string('city_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('internal_number')->nullable();
            $table->string('fax')->nullable();
            $table->string('cmnn_passport')->nullable();
            $table->string('postal_code')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->string('skin_class')->nullable()->default('no-skin');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
