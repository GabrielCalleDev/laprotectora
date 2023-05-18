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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 50)->unique()->nullable();
            $table->string('avatar', 255)->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('id_role')
                ->nullable()
                ->constrained('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_people')
                ->nullable()
                ->constrained('people')->onDelete('cascade')->onUpdate('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('avatar');
            $table->dropColumn('status');
            $table->dropForeign(['id_role']);
            $table->dropColumn('id_role');
            $table->dropForeign(['id_people']);
            $table->dropColumn('id_people');
        });
    }
};
