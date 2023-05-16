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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->string('breed')->nullable();
            $table->date('age')->nullable();
            $table->char('sex')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->string('adoption_status')->nullable();
            $table->date('admission_date')->nullable();
            $table->date('adoption_date')->nullable();
            $table->string('health_conditions')->nullable();
            $table->string('medications')->nullable();
            $table->string('history')->nullable();
            $table->boolean('neutered')->nullable();
            $table->string('observations')->nullable();
            $table->foreignId('shelter_house_id')->nullable()->constrained('shelters_houses')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
