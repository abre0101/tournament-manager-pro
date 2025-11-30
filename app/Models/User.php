<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'team_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Role constants
    const ROLE_SUPER_ADMIN = 'super_admin';
    const ROLE_ORGANIZER = 'organizer';
    const ROLE_TEAM_MANAGER = 'team_manager';
    const ROLE_REFEREE = 'referee';
    const ROLE_VIEWER = 'viewer';

    // Role check methods
    public function isSuperAdmin()
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }

    public function isOrganizer()
    {
        return $this->role === self::ROLE_ORGANIZER;
    }

    public function isTeamManager()
    {
        return $this->role === self::ROLE_TEAM_MANAGER;
    }

    public function isReferee()
    {
        return $this->role === self::ROLE_REFEREE;
    }

    public function isViewer()
    {
        return $this->role === self::ROLE_VIEWER;
    }

    public function canManageTeams()
    {
        return in_array($this->role, [self::ROLE_SUPER_ADMIN, self::ROLE_ORGANIZER, self::ROLE_TEAM_MANAGER]);
    }

    public function canManageGames()
    {
        return in_array($this->role, [self::ROLE_SUPER_ADMIN, self::ROLE_ORGANIZER]);
    }

    public function canRecordScores()
    {
        return in_array($this->role, [self::ROLE_SUPER_ADMIN, self::ROLE_ORGANIZER, self::ROLE_REFEREE]);
    }

    public function canManageLeagues()
    {
        return in_array($this->role, [self::ROLE_SUPER_ADMIN, self::ROLE_ORGANIZER]);
    }

    public function canApproveTeams()
    {
        return in_array($this->role, [self::ROLE_SUPER_ADMIN, self::ROLE_ORGANIZER]);
    }

    // Relationships
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}