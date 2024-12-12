<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('approved_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Reference to users table (students)
            $table->unsignedBigInteger('supervisor_id')->nullable(); // Reference to users table (supervisors)
            $table->string('group')->nullable(); // Group assignment
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approved_students');
    }
};
