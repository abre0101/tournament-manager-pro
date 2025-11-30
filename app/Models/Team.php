<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'user_id',      // Team manager/owner
        'name',         // Team name like "Arsenal", "Barcelona", etc.
        'logo',         // Path or URL to team logo
        'coach_name',   // Name of the team's coach
        'group',        // Group assignment in the tournament (e.g., 'A', 'B')
        'status',       // pending, approved, rejected
    ];

    /**
     * Relationship: Team belongs to a user (manager)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: One team has many players
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    /**
     * Check if team is approved
     */
    public function isApproved()
    {
        return $this->status === 'approved';
    }

    /**
     * Check if team is pending
     */
    public function isPending()
    {
        return $this->status === 'pending';
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
