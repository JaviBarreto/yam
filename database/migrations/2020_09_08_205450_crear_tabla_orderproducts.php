<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOrderproducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OrderProducts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');//FK
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->double('price');
            $table->double('total');
            $table->unsignedBigInteger('order_id');//FK
            $table->foreign('order_id')->references('id')->on('order');
            $table->string('comment');
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
        Schema::dropIfExists('OrderProducts');
    }
}
