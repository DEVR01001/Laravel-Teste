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
        Schema::table('books_category', function (Blueprint $table) {
            $table->foreign(['id'], 'books_category_ibfk_1')->references(['id'])->on('books')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_category'], 'books_category_ibfk_2')->references(['id_category'])->on('category')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books_category', function (Blueprint $table) {
            $table->dropForeign('books_category_ibfk_1');
            $table->dropForeign('books_category_ibfk_2');
        });
    }
};
