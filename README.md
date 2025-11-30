# ⚽ Tournament Manager - Complete Sports Management System

A comprehensive Laravel 12 application for managing sports tournaments, teams, players, and games with role-based access control.

![Laravel](https://img.shields.io/badge/Laravel-12.0-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)

## 🌟 Features

### Core Functionality
- ✅ **User Authentication** - Secure registration and login system
- ✅ **Role-Based Access Control** - 5 different user roles with specific permissions
- ✅ **Team Management** - Create, edit, and manage teams with logos
- ✅ **Player Management** - Comprehensive player profiles with positions and statistics
- ✅ **Game Scheduling** - Schedule matches between teams with dates and times
- ✅ **Score Tracking** - Record and display game scores
- ✅ **League Organization** - Create and manage multiple leagues/tournaments
- ✅ **Dashboard & Statistics** - Real-time tournament overview and analytics
- ✅ **Team Approval System** - Workflow for team registration approval
- ✅ **Responsive Design** - Modern UI with sports-themed styling

### User Roles

#### 1. 🔴 Super Admin
- Full system access
- Manage all users, teams, players, games, and leagues
- Approve/reject team registrations
- Delete any data

#### 2. 🟠 Tournament Organizer
- Create and manage leagues/tournaments
- Schedule games and fixtures
- Approve/reject team registrations
- View all statistics and reports
- Cannot manage other users

#### 3. 🟡 Team Manager
- Register and manage their own team(s)
- Add/edit/remove players from their teams
- Upload team logo
- View team schedule and statistics
- Cannot edit other teams

#### 4. 🟢 Referee
- View all games
- Record game scores
- Update match results
- Cannot create/delete games or manage teams

#### 5. 🔵 Viewer
- Read-only access
- View teams, players, games, and schedules
- Cannot edit or create anything

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite (default) or MySQL/PostgreSQL

## 🚀 Quick Start

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/tournament-manager.git
cd tournament-manager
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup
```bash
# Create SQLite database
type nul > database\database.sqlite

# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed
```

### 5. Storage Setup
```bash
php artisan storage:link
```

### 6. Build Assets
```bash
npm run build
```

### 7. Start the Server
```bash
php artisan serve
```

Visit: `http://localhost:8000`

## 👤 Default User Accounts

All passwords are: **password**

### Super Admin
- **Email:** admin@example.com
- **Access:** Full system control

### Tournament Organizer
- **Email:** organizer@example.com
- **Access:** League and game management

### Team Managers (6 users)
- **Manchester United:** manager.manutd@example.com
- **Barcelona:** manager.barca@example.com
- **Real Madrid:** manager.madrid@example.com
- **Bayern Munich:** manager.bayern@example.com
- **Liverpool:** manager.liverpool@example.com
- **Paris Saint-Germain:** manager.psg@example.com

### Referees
- **Referee 1:** referee1@example.com
- **Referee 2:** referee2@example.com

### Viewer
- **Email:** viewer@example.com
- **Access:** Read-only

## 📊 Sample Data

The seeder creates:
- **11 Users** (1 admin, 1 organizer, 6 team managers, 2 referees, 1 viewer)
- **6 Professional Teams** (Manchester United, Barcelona, Real Madrid, Bayern Munich, Liverpool, PSG)
- **30 Players** (5 per team with complete details: name, position, age, nationality, jersey number)
- **3 Games** (1 completed with scores, 2 upcoming)

## 🎮 Usage

### As Super Admin
1. Login with admin@example.com
2. Manage all aspects of the system
3. Approve/reject team registrations
4. Create leagues and schedule games

### As Team Manager
1. Login with your team manager account
2. View and edit your team
3. Add players to your team
4. View your team's schedule

### As Referee
1. Login with referee account
2. View all games
3. Record scores for completed games

### As Viewer
1. Login with viewer account
2. Browse teams, players, and games
3. View tournament statistics

## 🔐 Security Features

- ✅ CSRF protection on all forms
- ✅ Password hashing with bcrypt
- ✅ Role-based middleware protection
- ✅ SQL injection protection via Eloquent ORM
- ✅ XSS protection via Blade templating
- ✅ File upload validation
- ✅ Team ownership verification
- ✅ Permission checks at controller level

## 📁 Project Structure

```
tournament-manager/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/              # Authentication controllers
│   │   │   ├── TeamController.php
│   │   │   ├── PlayerController.php
│   │   │   ├── GameController.php
│   │   │   └── LeagueController.php
│   │   └── Middleware/
│   │       └── CheckRole.php      # Role-based access control
│   └── Models/
│       ├── User.php               # User with role methods
│       ├── Team.php               # Team with ownership
│       ├── Player.php
│       ├── Game.php
│       └── League.php
├── database/
│   ├── migrations/                # Database schema
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── AdditionalPlayersSeeder.php
│       └── RoleUsersSeeder.php
├── resources/
│   ├── views/
│   │   ├── auth/                  # Login/Register views
│   │   ├── teams/                 # Team management
│   │   ├── players/               # Player management
│   │   ├── games/                 # Game management
│   │   ├── leagues/               # League management
│   │   ├── tournament/            # Dashboard
│   │   └── layouts/
│   │       └── app.blade.php      # Main layout
│   ├── js/
│   └── sass/
└── routes/
    └── web.php                    # Application routes
```

## 🛠️ Development

### Run Development Server
```bash
php artisan serve
```

### Watch Assets
```bash
npm run dev
```

### Run All Services
```bash
composer dev
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Run Tests
```bash
php artisan test
```

## 🎨 Customization

### Change Application Name
Edit `.env` file:
```env
APP_NAME="Your Tournament Name"
```

### Change Database
Edit `.env` file for MySQL/PostgreSQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Customize Theme
Edit `resources/views/layouts/app.blade.php` for styling changes.

## 📱 API Endpoints

### Teams
- `GET /teams` - List all teams
- `POST /teams` - Create new team
- `GET /teams/{id}` - View team details
- `PUT /teams/{id}` - Update team
- `DELETE /teams/{id}` - Delete team
- `POST /teams/{id}/approve` - Approve team (Organizer only)
- `POST /teams/{id}/reject` - Reject team (Organizer only)

### Players
- `GET /players` - List all players
- `POST /players` - Create new player
- `GET /players/{id}` - View player details
- `PUT /players/{id}` - Update player
- `DELETE /players/{id}` - Delete player

### Games
- `GET /games` - List all games
- `POST /games` - Schedule new game
- `GET /games/{id}` - View game details
- `PUT /games/{id}` - Update game/scores
- `DELETE /games/{id}` - Delete game

### Leagues
- `GET /leagues` - List all leagues
- `POST /leagues` - Create new league
- `GET /leagues/{id}` - View league details
- `PUT /leagues/{id}` - Update league
- `DELETE /leagues/{id}` - Delete league

## 🐛 Troubleshooting

### Storage Link Not Working
```bash
php artisan storage:link
```

### Assets Not Loading
```bash
npm run build
```

### Database Errors
```bash
php artisan migrate:fresh --seed
```

### Permission Errors
Ensure `storage/` and `bootstrap/cache/` are writable.

### 403 Forbidden Errors
Check user role and permissions. Super admins have access to everything.

## 📚 Documentation

- [System Logic & User Roles](SYSTEM_LOGIC_AND_USERS.md)
- [Role System Implementation](ROLE_SYSTEM_IMPLEMENTED.md)
- [Setup Instructions](SETUP.md)
- [Quick Start Guide](QUICK_START.md)
- [Features Complete](FEATURES_COMPLETE.md)

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- Laravel Framework
- Bootstrap 5
- Font Awesome (for icons)
- All contributors and testers

## 📧 Support

For issues, questions, or suggestions:
- Open an issue on GitHub
- Email: support@example.com

## 🎯 Roadmap

### Upcoming Features
- [ ] User management interface for admins
- [ ] Email notifications for team approvals
- [ ] Player transfer system
- [ ] Match statistics and analytics
- [ ] League standings and rankings
- [ ] Tournament bracket generation
- [ ] Mobile app API
- [ ] Real-time score updates
- [ ] Multi-language support
- [ ] Export reports to PDF/Excel

## 📸 Screenshots

### Dashboard
![Dashboard](docs/screenshots/dashboard.png)

### Team Management
![Teams](docs/screenshots/teams.png)

### Game Scheduling
![Games](docs/screenshots/games.png)

---

**Built with ❤️ using Laravel 12**

⚽ **Ready to manage your tournament!** 🏆
