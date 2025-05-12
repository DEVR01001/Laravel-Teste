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
        Schema::create('ingessos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('qcode', 100);
            $table->integer('cadeira_id')->index('cadeira_id');
            $table->integer('usuario_id')->index('usuario_id');
            $table->integer('venda_id')->index('venda_id');
            $table->enum('status_infresso', ['US', 'DP'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingessos');
    }
};
