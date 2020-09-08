<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaStores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');//FK
            $table->foreign('restaurant_id')->references('id')->on('restaurant');
            $table->string('name');
            $table->string('address');
            $table->string('streetaddress');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('zipcode');
            $table->string('city');
            $table->string('state');
            $table->string('phonenumber');
            $table->string('email');
            $table->string('admincontact');
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
        Schema::dropIfExists('Stores');
    }
}
