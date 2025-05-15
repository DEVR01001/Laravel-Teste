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
        Schema::create('cadeiras', function (Blueprint $table) {
            $table->integer('id', true)->primary(true)->autoIncrement();
            $table->integer('number_cadeira');
            $table->enum('status', ['D','ND', 'M'])->nullable();
            $table->enum('nivel_cadeira', ['VP', 'CM'])->nullable();
            $table->integer('setores_id')->index('setores_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadeiras');
    }
};
