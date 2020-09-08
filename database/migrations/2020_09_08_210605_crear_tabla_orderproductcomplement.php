<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOrderproductcomplement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OrderProductComplement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderproduct_id');//FK
            $table->foreign('orderproduct_id')->references('id')->on('orderproducts');
            $table->unsignedBigInteger('product_id');//FK
            $table->foreign('product_id')->references('id')->on('products');
            $table->double('price');
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
        Schema::dropIfExists('OrderProductComplement');
    }
}
