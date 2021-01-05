<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('name');
            $table->string('fieldstreetaddress');
            $table->string('floorno');
            $table->string('houseno');
            $table->string('zipcode');
            $table->string('city');
            $table->string('state');
            $table->boolean('isdefault')->nullable();
            $table->enum('buildingtype',['Departamento','Casa','Oficina']);
            $table->text('district');
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
        Schema::dropIfExists('addresses');
    }
}
