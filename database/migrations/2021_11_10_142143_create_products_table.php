<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('shortDescription');
            $table->text('longDescription');
            $table->string('businessType');
            $table->string('size');
            $table->float('prize');
            $table->float('discountedPrize');
            $table->integer('soldedCount');
            $table->float('rating');
            $table->boolean('top');
            $table->boolean('bestOfWeek');
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
        Schema::dropIfExists('products');
    }
}
