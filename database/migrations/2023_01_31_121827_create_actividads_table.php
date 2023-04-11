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
        Schema::create('actividads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('responsable_id')->constrained();
            $table->foreignId('proyecto_id')->constrained();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('entregable');
            $table->boolean('concluida');
            $table->boolean('recurrente');
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
        Schema::dropIfExists('actividads');
    }
};
