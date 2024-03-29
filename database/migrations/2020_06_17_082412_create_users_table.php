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
            $table->string('idKey')->unique()->nullable();
            $table->string('type')->default('member')->nullable();
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('permission')->nullable();
            $table->bigInteger('idRoles')->unsigned()->nullable();
            $table->foreign('idRoles')->references('id')->on('roles')->onUpdate('cascade');
            $table->integer('user_type')->nullable()->default(0);
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('provider');
            $table->string('provider_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
            $table->longText('remember_token_password')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->string('status_name')->nullable()->default('Mở');
            $table->integer('status_payment')->nullable()->default(1);
            $table->string('status_payment_name')->nullable()->default('Trả Phí');
            $table->date('date')->nullable();
            $table->string('avatar')->nullable()->default(null);
            $table->string('full_name')->nullable();
            $table->string('english_name')->nullable();
            $table->string('nickname')->nullable();
            $table->date('working_day')->nullable();
            $table->boolean('sex')->nullable()->default(true);
            $table->longText('introduce')->nullable();
            $table->string('birthday')->nullable();
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
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
