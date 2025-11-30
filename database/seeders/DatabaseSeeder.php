<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'team_name' => 'Admin Team',
        ]);

        // Create sample teams
        $teams = [
            ['name' => 'Manchester United', 'coach_name' => 'Erik ten Hag', 'group' => 'A'],
            ['name' => 'Barcelona', 'coach_name' => 'Xavi Hernandez', 'group' => 'A'],
            ['name' => 'Real Madrid', 'coach_name' => 'Carlo Ancelotti', 'group' => 'B'],
            ['name' => 'Bayern Munich', 'coach_name' => 'Thomas Tuchel', 'group' => 'B'],
            ['name' => 'Liverpool', 'coach_name' => 'Jurgen Klopp', 'group' => 'A'],
            ['name' => 'Paris Saint-Germain', 'coach_name' => 'Luis Enrique', 'group' => 'B'],
        ];

        $createdTeams = [];
        foreach ($teams as $team) {
            $createdTeams[] = Team::create($team);
        }

        // Create sample games
        Game::create([
            'team1_id' => $createdTeams[0]->id,
            'team2_id' => $createdTeams[1]->id,
            'match_date' => now()->addDays(7),
            'match_time' => '15:00',
            'score1' => null,
            'score2' => null,
        ]);

        Game::create([
            'team1_id' => $createdTeams[2]->id,
            'team2_id' => $createdTeams[3]->id,
            'match_date' => now()->addDays(8),
            'match_time' => '18:00',
            'score1' => null,
            'score2' => null,
        ]);

        Game::create([
            'team1_id' => $createdTeams[4]->id,
            'team2_id' => $createdTeams[5]->id,
            'match_date' => now()->subDays(2),
            'match_time' => '20:00',
            'score1' => 2,
            'score2' => 1,
        ]);

        // Seed real players for all teams
        $this->call(RealPlayersSeeder::class);
    }
}
