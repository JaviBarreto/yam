<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaApplicationSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ApplicationSetting', function (Blueprint $table) {
            $table->id();
            $table->double('androidversion');
            $table->double('losversion');
            $table->boolean('isforcestopandroid');
            $table->boolean('isforcestopios');
            $table->boolean('maintenanceios');
            $table->boolean('maintenanceandroid');
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
        Schema::dropIfExists('ApplicationSetting');
    }
}
