<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key

            // Foreign keys for team1 and team2 (home and away teams)
            $table->foreignId('team1_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('team2_id')->constrained('teams')->onDelete('cascade');

            // Make sure team1 and team2 are not the same team
            $table->unique(['team1_id', 'team2_id', 'match_date', 'match_time'], 'unique_match');

            // Match date and time (separate date and time fields)
            $table->date('match_date');
            $table->time('match_time');

            // Match scores, nullable in case the game hasn't finished yet
            $table->integer('score1')->nullable();
            $table->integer('score2')->nullable();

            // Timestamp fields (created_at, updated_at)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}
