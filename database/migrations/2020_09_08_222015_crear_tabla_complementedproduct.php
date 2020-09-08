<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaComplementedproduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complementedproduct', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complement_id');//FK
            $table->foreign('complement_id')->references('id')->on('complements');
            $table->unsignedBigInteger('product_id');//FK
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('complementedproduct');
    }
}
