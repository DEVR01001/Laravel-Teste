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
        Schema::create('tickets', function (Blueprint $table) {
            $table->integer('id', true)->primary()->autoIncrement();
            $table->integer('sale_id')->index('sale_id');
            $table->integer('user_id')->index('user_id');
            $table->integer('chair_id')->index('chair_id');
            $table->enum('status_ticket', ['used', 'available', 'cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
