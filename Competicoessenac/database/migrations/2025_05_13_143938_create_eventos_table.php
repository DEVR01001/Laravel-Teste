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
        Schema::create('eventos', function (Blueprint $table) {
            $table->integer('id', true)->primary(true)->autoIncrement();
            $table->string('name', 100);
            $table->integer('capacidade_pessoas');
            $table->integer('cep');
            $table->string('bairro',40);
            $table->string('rua', 50);
            $table->integer('numero');
            $table->string('logo', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
