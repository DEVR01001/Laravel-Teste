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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true)->primary()->autoIncrement();
            $table->integer('cpf');
            $table->string('first_name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('email')->unique('email');
            $table->string('password');
            $table->enum('profile', ['client', 'admin', 'totem', 'saller']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
