<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');//FK
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('title');
            $table->dateTime('startdatetime');
            $table->dateTime('enddatetime');
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
        Schema::dropIfExists('Offers');
    }
}
