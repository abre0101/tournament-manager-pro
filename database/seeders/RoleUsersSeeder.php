<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;

class RoleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update existing admin user
        $admin = User::where('email', 'admin@example.com')->first();
        if ($admin) {
            $admin->update(['role' => 'super_admin']);
            $this->command->info('Updated admin user to super_admin role');
        }

        // Create Tournament Organizer
        $organizer = User::firstOrCreate(
            ['email' => 'organizer@example.com'],
            [
                'name' => 'Tournament Organizer',
                'password' => Hash::make('password'),
                'role' => 'organizer',
                'team_name' => null,
            ]
        );
        $this->command->info('Created organizer: organizer@example.com / password');

        // Create Team Managers for each team
        $teams = Team::all();
        $teamManagers = [
            'Manchester United' => ['name' => 'Erik ten Hag', 'email' => 'manager.manutd@example.com'],
            'Barcelona' => ['name' => 'Xavi Hernandez', 'email' => 'manager.barca@example.com'],
            'Real Madrid' => ['name' => 'Carlo Ancelotti', 'email' => 'manager.madrid@example.com'],
            'Bayern Munich' => ['name' => 'Thomas Tuchel', 'email' => 'manager.bayern@example.com'],
            'Liverpool' => ['name' => 'Jurgen Klopp', 'email' => 'manager.liverpool@example.com'],
            'Paris Saint-Germain' => ['name' => 'Luis Enrique', 'email' => 'manager.psg@example.com'],
        ];

        foreach ($teams as $team) {
            if (isset($teamManagers[$team->name])) {
                $managerData = $teamManagers[$team->name];
                
                $manager = User::firstOrCreate(
                    ['email' => $managerData['email']],
                    [
                        'name' => $managerData['name'],
                        'password' => Hash::make('password'),
                        'role' => 'team_manager',
                        'team_name' => $team->name,
                    ]
                );

                // Assign team to manager
                $team->update(['user_id' => $manager->id, 'status' => 'approved']);
                
                $this->command->info("Created team manager: {$managerData['email']} / password for {$team->name}");
            }
        }

        // Create Referees
        $referees = [
            ['name' => 'John Referee', 'email' => 'referee1@example.com'],
            ['name' => 'Jane Referee', 'email' => 'referee2@example.com'],
        ];

        foreach ($referees as $refData) {
            User::firstOrCreate(
                ['email' => $refData['email']],
                [
                    'name' => $refData['name'],
                    'password' => Hash::make('password'),
                    'role' => 'referee',
                    'team_name' => null,
                ]
            );
            $this->command->info("Created referee: {$refData['email']} / password");
        }

        // Create Viewer
        $viewer = User::firstOrCreate(
            ['email' => 'viewer@example.com'],
            [
                'name' => 'John Viewer',
                'password' => Hash::make('password'),
                'role' => 'viewer',
                'team_name' => null,
            ]
        );
        $this->command->info('Created viewer: viewer@example.com / password');

        $this->command->info('');
        $this->command->info('=== All Users Created ===');
        $this->command->info('Super Admin: admin@example.com / password');
        $this->command->info('Organizer: organizer@example.com / password');
        $this->command->info('Team Managers: manager.manutd@example.com, manager.barca@example.com, etc. / password');
        $this->command->info('Referees: referee1@example.com, referee2@example.com / password');
        $this->command->info('Viewer: viewer@example.com / password');
    }
}
