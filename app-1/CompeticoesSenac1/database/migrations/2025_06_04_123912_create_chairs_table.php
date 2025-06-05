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
        Schema::create('chairs', function (Blueprint $table) {
            $table->integer('id', true)->primary()->autoIncrement();
            $table->string('number_chair', 10);
            $table->enum('status_chair', ['available', 'occupied', 'maintenance']);
            $table->enum('level_chair', ['vip', 'common']);
            $table->integer('sector_id')->index('sector_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chairs');
    }
};
