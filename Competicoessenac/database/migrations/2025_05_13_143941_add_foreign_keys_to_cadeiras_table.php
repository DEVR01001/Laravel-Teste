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
        Schema::table('cadeiras', function (Blueprint $table) {
            $table->foreign(['setores_id'], 'cadeiras_ibfk_1')->references(['id'])->on('setores')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cadeiras', function (Blueprint $table) {
            $table->dropForeign('cadeiras_ibfk_1');
        });
    }
};
