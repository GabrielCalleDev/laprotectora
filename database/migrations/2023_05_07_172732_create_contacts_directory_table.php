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
        Schema::create('contacts_directory', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('phone', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('company', 150)->nullable();
            $table->string('position', 150)->nullable();
            $table->string('notes', 150)->nullable();
            $table->string('type', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts_directory');
    }
};
