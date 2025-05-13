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
        Schema::create('setores', function (Blueprint $table) {
            $table->integer('id', true)->primary(true)->autoIncrement();
            $table->string('name', 50);
            $table->integer('quantidade_cadeiras');
            $table->decimal('comprimento')->nullable();
            $table->decimal('largura')->nullable();
            $table->integer('eventos_id')->index('eventos_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setores');
    }
};
