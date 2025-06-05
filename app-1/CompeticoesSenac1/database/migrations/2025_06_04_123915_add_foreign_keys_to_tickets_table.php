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
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign(['sale_id'], 'tickets_ibfk_1')->references(['id'])->on('sales')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['user_id'], 'tickets_ibfk_2')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['chair_id'], 'tickets_ibfk_3')->references(['id'])->on('chairs')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_ibfk_1');
            $table->dropForeign('tickets_ibfk_2');
            $table->dropForeign('tickets_ibfk_3');
        });
    }
};
