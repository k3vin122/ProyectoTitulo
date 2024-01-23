<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToRotulosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rotulos', function (Blueprint $table) {
            $table
                ->foreign('estado_rotulo_id')
                ->references('id')
                ->on('estado_rotulos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rotulos', function (Blueprint $table) {
            $table->dropForeign(['estado_rotulo_id']);
        });
    }
}
