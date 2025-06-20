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
        Schema::table('qrcodes', function (Blueprint $table) {
            $table->foreign(['ticket_id'], 'qrcodes_ibfk_1')->references(['id'])->on('tickets')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('qrcodes', function (Blueprint $table) {
            $table->dropForeign('qrcodes_ibfk_1');
        });
    }
};
