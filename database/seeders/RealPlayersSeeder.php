<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Player;

class RealPlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all teams
        $teams = Team::all();

        // Real players data for each team
        $playersData = [
            'Manchester United' => [
                ['name' => 'Andre Onana', 'position' => 'Goalkeeper', 'jersey_number' => 24],
                ['name' => 'Diogo Dalot', 'position' => 'Defender', 'jersey_number' => 20],
                ['name' => 'Lisandro Martinez', 'position' => 'Defender', 'jersey_number' => 6],
                ['name' => 'Harry Maguire', 'position' => 'Defender', 'jersey_number' => 5],
                ['name' => 'Luke Shaw', 'position' => 'Defender', 'jersey_number' => 23],
                ['name' => 'Casemiro', 'position' => 'Midfielder', 'jersey_number' => 18],
                ['name' => 'Bruno Fernandes', 'position' => 'Midfielder', 'jersey_number' => 8],
                ['name' => 'Mason Mount', 'position' => 'Midfielder', 'jersey_number' => 7],
                ['name' => 'Marcus Rashford', 'position' => 'Forward', 'jersey_number' => 10],
                ['name' => 'Rasmus Hojlund', 'position' => 'Forward', 'jersey_number' => 11],
                ['name' => 'Antony', 'position' => 'Forward', 'jersey_number' => 21],
            ],
            'Barcelona' => [
                ['name' => 'Marc-Andre ter Stegen', 'position' => 'Goalkeeper', 'jersey_number' => 1],
                ['name' => 'Jules Kounde', 'position' => 'Defender', 'jersey_number' => 23],
                ['name' => 'Ronald Araujo', 'position' => 'Defender', 'jersey_number' => 4],
                ['name' => 'Andreas Christensen', 'position' => 'Defender', 'jersey_number' => 15],
                ['name' => 'Alejandro Balde', 'position' => 'Defender', 'jersey_number' => 3],
                ['name' => 'Frenkie de Jong', 'position' => 'Midfielder', 'jersey_number' => 21],
                ['name' => 'Pedri', 'position' => 'Midfielder', 'jersey_number' => 8],
                ['name' => 'Gavi', 'position' => 'Midfielder', 'jersey_number' => 6],
                ['name' => 'Robert Lewandowski', 'position' => 'Forward', 'jersey_number' => 9],
                ['name' => 'Raphinha', 'position' => 'Forward', 'jersey_number' => 11],
                ['name' => 'Ferran Torres', 'position' => 'Forward', 'jersey_number' => 7],
            ],
            'Real Madrid' => [
                ['name' => 'Thibaut Courtois', 'position' => 'Goalkeeper', 'jersey_number' => 1],
                ['name' => 'Dani Carvajal', 'position' => 'Defender', 'jersey_number' => 2],
                ['name' => 'Eder Militao', 'position' => 'Defender', 'jersey_number' => 3],
                ['name' => 'Antonio Rudiger', 'position' => 'Defender', 'jersey_number' => 22],
                ['name' => 'Ferland Mendy', 'position' => 'Defender', 'jersey_number' => 23],
                ['name' => 'Luka Modric', 'position' => 'Midfielder', 'jersey_number' => 10],
                ['name' => 'Toni Kroos', 'position' => 'Midfielder', 'jersey_number' => 8],
                ['name' => 'Federico Valverde', 'position' => 'Midfielder', 'jersey_number' => 15],
                ['name' => 'Jude Bellingham', 'position' => 'Midfielder', 'jersey_number' => 5],
                ['name' => 'Vinicius Junior', 'position' => 'Forward', 'jersey_number' => 7],
                ['name' => 'Rodrygo', 'position' => 'Forward', 'jersey_number' => 11],
            ],
            'Bayern Munich' => [
                ['name' => 'Manuel Neuer', 'position' => 'Goalkeeper', 'jersey_number' => 1],
                ['name' => 'Joshua Kimmich', 'position' => 'Defender', 'jersey_number' => 6],
                ['name' => 'Dayot Upamecano', 'position' => 'Defender', 'jersey_number' => 2],
                ['name' => 'Kim Min-jae', 'position' => 'Defender', 'jersey_number' => 3],
                ['name' => 'Alphonso Davies', 'position' => 'Defender', 'jersey_number' => 19],
                ['name' => 'Leon Goretzka', 'position' => 'Midfielder', 'jersey_number' => 8],
                ['name' => 'Jamal Musiala', 'position' => 'Midfielder', 'jersey_number' => 42],
                ['name' => 'Leroy Sane', 'position' => 'Forward', 'jersey_number' => 10],
                ['name' => 'Harry Kane', 'position' => 'Forward', 'jersey_number' => 9],
                ['name' => 'Serge Gnabry', 'position' => 'Forward', 'jersey_number' => 7],
                ['name' => 'Kingsley Coman', 'position' => 'Forward', 'jersey_number' => 11],
            ],
            'Liverpool' => [
                ['name' => 'Alisson Becker', 'position' => 'Goalkeeper', 'jersey_number' => 1],
                ['name' => 'Trent Alexander-Arnold', 'position' => 'Defender', 'jersey_number' => 66],
                ['name' => 'Virgil van Dijk', 'position' => 'Defender', 'jersey_number' => 4],
                ['name' => 'Ibrahima Konate', 'position' => 'Defender', 'jersey_number' => 5],
                ['name' => 'Andy Robertson', 'position' => 'Defender', 'jersey_number' => 26],
                ['name' => 'Alexis Mac Allister', 'position' => 'Midfielder', 'jersey_number' => 10],
                ['name' => 'Dominik Szoboszlai', 'position' => 'Midfielder', 'jersey_number' => 8],
                ['name' => 'Curtis Jones', 'position' => 'Midfielder', 'jersey_number' => 17],
                ['name' => 'Mohamed Salah', 'position' => 'Forward', 'jersey_number' => 11],
                ['name' => 'Darwin Nunez', 'position' => 'Forward', 'jersey_number' => 9],
                ['name' => 'Luis Diaz', 'position' => 'Forward', 'jersey_number' => 7],
            ],
            'Paris Saint-Germain' => [
                ['name' => 'Gianluigi Donnarumma', 'position' => 'Goalkeeper', 'jersey_number' => 99],
                ['name' => 'Achraf Hakimi', 'position' => 'Defender', 'jersey_number' => 2],
                ['name' => 'Marquinhos', 'position' => 'Defender', 'jersey_number' => 5],
                ['name' => 'Milan Skriniar', 'position' => 'Defender', 'jersey_number' => 37],
                ['name' => 'Lucas Hernandez', 'position' => 'Defender', 'jersey_number' => 21],
                ['name' => 'Vitinha', 'position' => 'Midfielder', 'jersey_number' => 17],
                ['name' => 'Warren Zaire-Emery', 'position' => 'Midfielder', 'jersey_number' => 33],
                ['name' => 'Fabian Ruiz', 'position' => 'Midfielder', 'jersey_number' => 8],
                ['name' => 'Kylian Mbappe', 'position' => 'Forward', 'jersey_number' => 7],
                ['name' => 'Ousmane Dembele', 'position' => 'Forward', 'jersey_number' => 10],
                ['name' => 'Goncalo Ramos', 'position' => 'Forward', 'jersey_number' => 9],
            ],
        ];

        // Create players for each team
        foreach ($teams as $team) {
            if (isset($playersData[$team->name])) {
                foreach ($playersData[$team->name] as $playerData) {
                    Player::create([
                        'name' => $playerData['name'],
                        'team_id' => $team->id,
                        'position' => $playerData['position'],
                        'jersey_number' => $playerData['jersey_number'],
                    ]);
                }
                
                $this->command->info("Created " . count($playersData[$team->name]) . " players for {$team->name}");
            }
        }

        $this->command->info('Real players seeded successfully!');
    }
}
