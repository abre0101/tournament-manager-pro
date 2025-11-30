<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->string('logo')->nullable(); // For team logos
            $table->string('coach_name')->nullable(); // Optional coach name
            $table->string('group')->nullable(); // e.g., Group A, Group B
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
