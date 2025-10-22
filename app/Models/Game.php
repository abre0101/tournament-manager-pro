<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'team1_id',
        'team2_id',
        'match_date',
        'match_time',
        'location',
    ];

    protected $casts = [
        'match_date' => 'datetime',
    ];

    // Relationships
  // In App\Models\Game.php
  public function team1()
  {
      return $this->belongsTo(Team::class, 'team1_id');
  }
  
  public function team2()
  {
      return $this->belongsTo(Team::class, 'team2_id');
  }
  

}
