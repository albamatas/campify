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
        Schema::create('home_campers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->longtext('descripcion');
            $table->decimal('precio', 8 ,2);
            $table->integer('plazas');
            $table->enum('status', [1, 2, 3])->default(3);
            $table->string('slug');
            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tipo_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos_home_campers');
            

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
        Schema::dropIfExists('home_campers');
    }
};
