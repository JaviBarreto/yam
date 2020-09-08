<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProductcomplements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProductComplements', function (Blueprint $table) {
            $table->id();
            /*$table->unsignedBigInteger('product_id');//FK
            $table->foreign('product_id')->references('id')->on('products');*/
            $table->unsignedBigInteger('complement_id');//FK
            $table->foreign('complement_id')->references('id')->on('complements');
            $table->boolean('ismendatory');
            $table->boolean('multiselect');
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
        Schema::dropIfExists('ProductComplements');
    }
}
