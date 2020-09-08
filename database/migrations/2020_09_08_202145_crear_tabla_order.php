<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');//FK
            $table->foreign('user_id')->references('user_id')->on('addresses');
            $table->unsignedBigInteger('address_id');//FK
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->time('starttime');
            $table->time('endtime');
            $table->unsignedBigInteger('store_id');//FK
            $table->foreign('store_id')->references('id')->on('stores');
            $table->enum('orderstatus',['cart','placed','shipping','delivered','cancelled','refund']);
            $table->enum('ordertype',['home','pickup']);
            $table->enum('paymentmethod',['case','card']);
            $table->dateTime('orderdate');
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
        Schema::dropIfExists('Order');
    }
}
