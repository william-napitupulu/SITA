<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Only add 'role' column if it doesn't already exist
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('student');  // Add default value if needed
            });
        }
        
        // Add other columns if needed...
    }

    public function down(): void
    {
        // Drop 'role' column in the down method
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }

};
