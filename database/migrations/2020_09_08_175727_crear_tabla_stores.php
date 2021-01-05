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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->string('name');
            $table->string('address');
            $table->string('streetaddress')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('zipcode')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('phonenumber')->nullable();
            $table->string('email')->nullable();
            $table->string('admincontact')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
