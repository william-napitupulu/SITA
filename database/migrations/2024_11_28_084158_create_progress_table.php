// database/migrations/xxxx_xx_xx_xxxxxx_create_progress_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Assuming you have a user table
            $table->enum('semester', ['first', 'second']);
            $table->string('task');
            $table->enum('status', ['not started', 'in progress', 'completed']);
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('progress');
    }
}
