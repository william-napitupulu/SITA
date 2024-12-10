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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->integer('dim_id'); // DIM ID (unique identifier for students)
            $table->integer('user_id')->unique(); // Unique user ID
            $table->string('username')->unique(); // Username for login
            $table->string('password'); // Password (hashed)
            $table->string('role')->default('student'); // Role for the user
            $table->string('nim'); // Student ID
            $table->string('name'); // Full name of the student
            $table->string('email')->nullable(); // Student email
            $table->integer('prodi_id'); // Program of Study ID
            $table->string('prodi_name'); // Program of Study name
            $table->string('fakultas'); // Faculty name
            $table->string('angkatan'); // Year of entrance
            $table->string('status'); // Student status (active, inactive, etc.)
            $table->string('asrama')->nullable(); // Dormitory information (optional)
            $table->string('supervisor')->nullable(); // Student phone number (optional)
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students'); // Drop the students table
    }
};
