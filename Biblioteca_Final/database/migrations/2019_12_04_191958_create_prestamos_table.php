<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('prestamos');
        Schema::create('prestamos', function (Blueprint $table) {
            $table->primary(['libro_id', 'user_id']);
            $table->dateTime('fecha_prestamo')->nullable();
            $table->dateTime('fecha_devolucion')->nullable();
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('libro_id')->references('id')->on('libros');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('_prestamos');
    }
}
