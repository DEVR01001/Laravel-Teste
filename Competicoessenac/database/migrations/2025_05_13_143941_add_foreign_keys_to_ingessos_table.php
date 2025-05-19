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
        Schema::table('ingressos', function (Blueprint $table) {
            $table->foreign(['cadeira_id'], 'ingressos_ibfk_1')->references(['id'])->on('cadeiras')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'ingressos_ibfk_2')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['venda_id'], 'ingressos_ibfk_3')->references(['id'])->on('vendas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingressos', function (Blueprint $table) {
            $table->dropForeign('ingressos_ibfk_1');
            $table->dropForeign('ingressos_ibfk_2');
            $table->dropForeign('ingressos_ibfk_3');
        });
    }
};
