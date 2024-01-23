<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToIngresoCintaSnRotulosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ingreso_cinta_sn_rotulos', function (Blueprint $table) {
            $table
                ->foreign('estado_sn_rotulo_id')
                ->references('id')
                ->on('estado_sn_rotulos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('rotulo_id')
                ->references('id')
                ->on('rotulos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingreso_cinta_sn_rotulos', function (Blueprint $table) {
            $table->dropForeign(['estado_sn_rotulo_id']);
            $table->dropForeign(['rotulo_id']);
        });
    }
}
