<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaStorestiming extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StoreTiming', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');//FK
            $table->foreign('store_id')->references('id')->on('stores');
            $table->enum('dayofweek', ['sun', 'mon','tue','wed','thu','fri','sat']);
            $table->time('starttime');
            $table->time('endtime');
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
        Schema::dropIfExists('StoreTiming');
    }
}
