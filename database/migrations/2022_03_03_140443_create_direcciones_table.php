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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();

            $table->string('calle');
            $table->integer('numero');

            $table->unsignedBigInteger('poblacion_id');
            $table->unsignedBigInteger('provincia_id');
            
            $table->decimal('altitud', 9, 6)->nullable();
            $table->decimal('longitud', 9, 6)->nullable();

            $table->unsignedBigInteger('homecamper_id');

            $table->timestamps();

            $table->foreign('homecamper_id')->references('id')->on('home_campers')->onDelete('cascade');
            $table->foreign('poblacion_id')->references('id')->on('poblaciones');
            $table->foreign('provincia_id')->references('id')->on('provincias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
};
