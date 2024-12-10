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
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });

        // Check if the 'role' column already exists, if not, add it
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('student');  // Add default value if needed
            });
        }

        // Check if the 'jabatan' column already exists, if not, add it
        if (!Schema::hasColumn('users', 'jabatan')) {
            Schema::table('users', function (Blueprint $table) {
                $table->json('jabatan')->nullable(); // Add jabatan column if it doesn't exist
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
