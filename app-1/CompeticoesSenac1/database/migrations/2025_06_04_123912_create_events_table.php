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
        Schema::create('events', function (Blueprint $table) {
            $table->integer('id', true)->primary()->autoIncrement();
            $table->string('name');
            $table->date('date_event');
            $table->time('time_event');
            $table->string('cep', 10);
            $table->integer('capacidade_pessoas');
            $table->integer('quant_pessoas_reservadas')->nullable();;
            $table->string('street');
            $table->string('neighborhood');
            $table->string('city', 100);
            $table->string('number', 10);
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
