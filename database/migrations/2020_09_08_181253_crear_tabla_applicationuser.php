<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaApplicationuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ApplicationUser', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('profileimage');
            $table->string('username');
            $table->string('phonenumber');
            $table->string('dninumber');
            $table->boolean('isactive');
            $table->dateTime('createddate');
            $table->unsignedBigInteger('role_id');//FK
            $table->foreign('role_id')->references('id')->on('userrole');

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
        Schema::dropIfExists('ApplicationUser');
    }
}
