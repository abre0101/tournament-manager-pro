<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Player name
            $table->unsignedBigInteger('team_id'); // Foreign key for team
            $table->string('position'); // Player position (e.g., Forward, Midfielder)
            $table->integer('age'); // Player age
            $table->string('nationality'); // Player nationality
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players'); // Drop the players table if it exists
    }
}