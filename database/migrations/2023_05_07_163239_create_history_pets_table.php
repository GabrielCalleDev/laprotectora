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
        Schema::create('history_pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->nullable()->constrained('pets')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date');
            $table->string('type');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_pets');
    }
};
