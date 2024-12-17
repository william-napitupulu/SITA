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
        Schema::create('eligibilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_number');
            $table->date('date_of_birth');
            $table->string('phone_number')->nullable();
            $table->enum('eligibility_status', ['eligible', 'not_eligible', 'pending'])->default('pending');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eligibilities');
    }
};
