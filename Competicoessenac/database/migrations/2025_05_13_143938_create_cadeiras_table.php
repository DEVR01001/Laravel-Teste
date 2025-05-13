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
            $table->enum('status', ['D\'\'ND', 'M'])->nullable();
            $table->decimal('comprimento')->nullable();
            $table->decimal('largura')->nullable();
            $table->integer('setor_id')->index('setor_id');
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
