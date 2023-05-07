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
        Schema::create('shelters_houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('responsible');
            $table->string('street_address');
            $table->string('street_number');
            $table->string('address_details')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->string('coordinates')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('capacity')->nullable();
            $table->string('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelters_houses');
    }
};
