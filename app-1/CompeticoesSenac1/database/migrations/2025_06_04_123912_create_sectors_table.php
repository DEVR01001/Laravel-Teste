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
        Schema::create('sectors', function (Blueprint $table) {
            $table->integer('id', true)->primary()->autoIncrement();
            $table->string('name', 100);
            $table->integer('quantity_chairs');
            $table->integer('quantity_rows');
            $table->enum('status', ['available', 'maintenance', 'unavailable']);
            $table->enum('level', ['vip', 'common']);
            $table->integer('event_id')->index('event_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sectors');
    }
};
