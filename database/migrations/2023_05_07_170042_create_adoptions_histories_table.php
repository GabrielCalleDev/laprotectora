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
        Schema::create('adoptions_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adoption_id')->constrained('adoptions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status', 150)->nullable();
            $table->string('update', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoptions_histories');
    }
};
