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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('dni', 9)->nullable();
            $table->bigInteger('phone')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('street_address', 100)->nullable();
            $table->integer('address_number')->nullable();
            $table->string('address_details', 100)->nullable();
            $table->string('city', 50)->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('type', 20)->nullable();
            $table->string('observations', 100)->nullable();
            $table->string('occupation', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
