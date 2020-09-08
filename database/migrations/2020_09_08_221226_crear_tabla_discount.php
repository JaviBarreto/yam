<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Discount', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');//FK
            $table->foreign('product_id')->references('id')->on('products');
            $table->double('value');
            $table->enum('discounttype',['flat','percentage']);
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
        Schema::dropIfExists('Discount');
    }
}
