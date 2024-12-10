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
        Schema::create('coordinators', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->integer('pegawai_id'); // Employee ID (unique for coordinators)
            $table->integer('dosen_id')->unique(); // Lecturer ID (unique identifier for coordinators)
            $table->string('nip'); // National Lecturer Identifier (NIP)
            $table->string('username')->unique(); // Username for login
            $table->string('password'); // Password (hashed)
            $table->string('role')->default('coordinator'); // Role (coordinator)
            $table->string('nama'); // Full name of the coordinator
            $table->string('email')->nullable(); // Email address
            $table->integer('prodi_id'); // Program of Study ID
            $table->string('prodi'); // Program of Study name
            $table->string('jabatan_akademik'); // Academic position (e.g., "C", "D")
            $table->string('jabatan_akademik_desc'); // Description of the academic position
            $table->string('jenjang_pendidikan'); // Educational level (e.g., "Master", "PhD")
            $table->string('nidn'); // National Lecturer ID (unique)
            $table->integer('user_id')->unique(); // Unique User ID
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordinators'); // Drop the coordinators table
    }
};
