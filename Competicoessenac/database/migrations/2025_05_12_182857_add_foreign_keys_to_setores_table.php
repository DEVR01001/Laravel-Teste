<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('setores', function (Blueprint $table) {
            $table->foreign(['evento_id'], 'setores_ibfk_1')->references(['id'])->on('eventos')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setores', function (Blueprint $table) {
            $table->dropForeign('setores_ibfk_1');
        });
    }
};
