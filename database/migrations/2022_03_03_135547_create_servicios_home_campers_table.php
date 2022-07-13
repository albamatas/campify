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
        Schema::create('servicios_home_campers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_homecamper');
            $table->unsignedBigInteger('id_servicio');
            $table->decimal('precio', 8 ,2);

            $table->timestamps();

            $table->foreign('id_homecamper')->references('id')->on('home_campers');
            $table->foreign('id_servicio')->references('id')->on('servicios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios_home_campers');
    }
};
