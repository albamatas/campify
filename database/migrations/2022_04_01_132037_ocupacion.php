<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocupacion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
           
            $table->unsignedBigInteger('homecamper_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reserva_id');

            $table->foreign('homecamper_id')->references('id')->on('home_campers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('reserva_id')->references('id')->on('reservas');

            $table->timestamps();
        });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
