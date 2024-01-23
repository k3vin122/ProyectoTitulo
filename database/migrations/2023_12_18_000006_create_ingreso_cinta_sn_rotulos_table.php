<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoCintaSnRotulosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingreso_cinta_sn_rotulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serie');
            $table->string('almacenamiento');
            $table->string('marca');
            $table->unsignedBigInteger('estado_sn_rotulo_id');
            $table->unsignedBigInteger('rotulo_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingreso_cinta_sn_rotulos');
    }
}
