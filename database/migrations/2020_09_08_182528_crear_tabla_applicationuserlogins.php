<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaApplicationuserlogins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_user_logins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');//FK
            $table->foreign('userid')->references('id')->on('users');
            $table->string('devicetoken');
            $table->enum('platform', ['']);
            $table->string('ipaddress');
            $table->double('appversion');
            $table->string('devicemanufacturer');
            $table->string('devicemodel');
            $table->dateTime('logindatetime');
            $table->dateTime('logoutdatetime');
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
        Schema::dropIfExists('application_user_logins');
    }
}
