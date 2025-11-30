<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Player;

class AdditionalPlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = Team::all();

        if ($teams->isEmpty()) {
            $this->command->warn('No teams found. Please seed teams first.');
            return;
        }

        // Additional players for each team
        $playersData = [
            // Manchester United players
            [
                'team_name' => 'Manchester United',
                'players' => [
                    ['name' => 'Marcus Rashford', 'position' => 'Forward', 'jersey_number' => 10, 'age' => 26, 'nationality' => 'England'],
                    ['name' => 'Bruno Fernandes', 'position' => 'Midfielder', 'jersey_number' => 8, 'age' => 29, 'nationality' => 'Portugal'],
                    ['name' => 'Casemiro', 'position' => 'Midfielder', 'jersey_number' => 18, 'age' => 31, 'nationality' => 'Brazil'],
                    ['name' => 'Lisandro Martinez', 'position' => 'Defender', 'jersey_number' => 6, 'age' => 25, 'nationality' => 'Argentina'],
                    ['name' => 'Andre Onana', 'position' => 'Goalkeeper', 'jersey_number' => 24, 'age' => 27, 'nationality' => 'Cameroon'],
                ]
            ],
            // Barcelona players
            [
                'team_name' => 'Barcelona',
                'players' => [
                    ['name' => 'Robert Lewandowski', 'position' => 'Forward', 'jersey_number' => 9, 'age' => 35, 'nationality' => 'Poland'],
                    ['name' => 'Pedri', 'position' => 'Midfielder', 'jersey_number' => 16, 'age' => 21, 'nationality' => 'Spain'],
                    ['name' => 'Gavi', 'position' => 'Midfielder', 'jersey_number' => 6, 'age' => 19, 'nationality' => 'Spain'],
                    ['name' => 'Ronald Araujo', 'position' => 'Defender', 'jersey_number' => 4, 'age' => 24, 'nationality' => 'Uruguay'],
                    ['name' => 'Marc-Andre ter Stegen', 'position' => 'Goalkeeper', 'jersey_number' => 1, 'age' => 31, 'nationality' => 'Germany'],
                ]
            ],
            // Real Madrid players
            [
                'team_name' => 'Real Madrid',
                'players' => [
                    ['name' => 'Vinicius Junior', 'position' => 'Forward', 'jersey_number' => 7, 'age' => 23, 'nationality' => 'Brazil'],
                    ['name' => 'Luka Modric', 'position' => 'Midfielder', 'jersey_number' => 10, 'age' => 38, 'nationality' => 'Croatia'],
                    ['name' => 'Jude Bellingham', 'position' => 'Midfielder', 'jersey_number' => 5, 'age' => 20, 'nationality' => 'England'],
                    ['name' => 'Antonio Rudiger', 'position' => 'Defender', 'jersey_number' => 22, 'age' => 30, 'nationality' => 'Germany'],
                    ['name' => 'Thibaut Courtois', 'position' => 'Goalkeeper', 'jersey_number' => 1, 'age' => 31, 'nationality' => 'Belgium'],
                ]
            ],
            // Bayern Munich players
            [
                'team_name' => 'Bayern Munich',
                'players' => [
                    ['name' => 'Harry Kane', 'position' => 'Forward', 'jersey_number' => 9, 'age' => 30, 'nationality' => 'England'],
                    ['name' => 'Jamal Musiala', 'position' => 'Midfielder', 'jersey_number' => 42, 'age' => 20, 'nationality' => 'Germany'],
                    ['name' => 'Joshua Kimmich', 'position' => 'Midfielder', 'jersey_number' => 6, 'age' => 28, 'nationality' => 'Germany'],
                    ['name' => 'Dayot Upamecano', 'position' => 'Defender', 'jersey_number' => 2, 'age' => 25, 'nationality' => 'France'],
                    ['name' => 'Manuel Neuer', 'position' => 'Goalkeeper', 'jersey_number' => 1, 'age' => 37, 'nationality' => 'Germany'],
                ]
            ],
            // Liverpool players
            [
                'team_name' => 'Liverpool',
                'players' => [
                    ['name' => 'Mohamed Salah', 'position' => 'Forward', 'jersey_number' => 11, 'age' => 31, 'nationality' => 'Egypt'],
                    ['name' => 'Darwin Nunez', 'position' => 'Forward', 'jersey_number' => 9, 'age' => 24, 'nationality' => 'Uruguay'],
                    ['name' => 'Alexis Mac Allister', 'position' => 'Midfielder', 'jersey_number' => 10, 'age' => 24, 'nationality' => 'Argentina'],
                    ['name' => 'Virgil van Dijk', 'position' => 'Defender', 'jersey_number' => 4, 'age' => 32, 'nationality' => 'Netherlands'],
                    ['name' => 'Alisson Becker', 'position' => 'Goalkeeper', 'jersey_number' => 1, 'age' => 31, 'nationality' => 'Brazil'],
                ]
            ],
            // Paris Saint-Germain players
            [
                'team_name' => 'Paris Saint-Germain',
                'players' => [
                    ['name' => 'Kylian Mbappe', 'position' => 'Forward', 'jersey_number' => 7, 'age' => 25, 'nationality' => 'France'],
                    ['name' => 'Ousmane Dembele', 'position' => 'Forward', 'jersey_number' => 10, 'age' => 26, 'nationality' => 'France'],
                    ['name' => 'Vitinha', 'position' => 'Midfielder', 'jersey_number' => 17, 'age' => 23, 'nationality' => 'Portugal'],
                    ['name' => 'Marquinhos', 'position' => 'Defender', 'jersey_number' => 5, 'age' => 29, 'nationality' => 'Brazil'],
                    ['name' => 'Gianluigi Donnarumma', 'position' => 'Goalkeeper', 'jersey_number' => 99, 'age' => 24, 'nationality' => 'Italy'],
                ]
            ],
        ];

        foreach ($playersData as $teamData) {
            $team = $teams->firstWhere('name', $teamData['team_name']);
            
            if ($team) {
                foreach ($teamData['players'] as $playerData) {
                    // Check if player already exists
                    $exists = Player::where('name', $playerData['name'])
                        ->where('team_id', $team->id)
                        ->exists();
                    
                    if (!$exists) {
                        Player::create([
                            'name' => $playerData['name'],
                            'team_id' => $team->id,
                            'position' => $playerData['position'],
                            'jersey_number' => $playerData['jersey_number'],
                            'age' => $playerData['age'],
                            'nationality' => $playerData['nationality'],
                        ]);
                        $this->command->info("Created player: {$playerData['name']} for {$team->name}");
                    }
                }
            }
        }

        $this->command->info('Additional players seeded successfully!');
    }
}
