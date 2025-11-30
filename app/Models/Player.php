<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'team_id',
        'position',
        'age',
        'nationality',
        'jersey_number',
    ];

    /**
     * Relationship: A player belongs to a team
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
