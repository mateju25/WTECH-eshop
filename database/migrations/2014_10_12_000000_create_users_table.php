<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('street');
            $table->string('postalCode');
            $table->string('city');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state');
            $table->unsignedInteger('customer_info_id');
            $table->foreign('customer_info_id')->references('id')->on('customer_infos');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->boolean('admin');
            $table->unsignedInteger('customer_info_id');
            $table->unsignedInteger('order_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('customer_info_id')->references('id')->on('customer_infos');
            $table->foreign('order_id')->references('id')->on('orders');
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
