<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',         // Team name like "Arsenal", "Barcelona", etc.
        'logo',         // Path or URL to team logo
        'coach_name',   // Name of the team's coach
        'group',        // Group assignment in the tournament (e.g., 'A', 'B')
    ];

    /**
     * Relationship: One team has many players
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    /**
     * Optionally, if you're tracking matches:
     * One team can have many matches (as home or away)
     */
    public function homeMatches()
    {
        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function awayMatches()
    {
        return $this->hasMany(Game::class, 'away_team_id');
    }
}
