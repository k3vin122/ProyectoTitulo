<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToCintasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cintas', function (Blueprint $table) {
            $table
                ->foreign('ingreso_cinta_sn_rotulo_id')
                ->references('id')
                ->on('ingreso_cinta_sn_rotulos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cintas', function (Blueprint $table) {
            $table->dropForeign(['ingreso_cinta_sn_rotulo_id']);
        });
    }
}
