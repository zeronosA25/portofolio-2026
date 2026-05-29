# 📄 Portofolio Project - Portfolio Management System

> Sistem manajemen portofolio berbasis web dengan admin panel menggunakan Laravel 12 dan Filament.

**Penulis:** Muhammad Aditya  
**NIM:** 20240801234  
**Tahun:** 2026

---

## 📋 Daftar Isi

- [Ringkasan Project](#-ringkasan-project)
- [Riwayat Commit (Git History)](#-riwayat-commit-git-history)
- [Teknologi & Stack](#-teknologi--stack)
- [Struktur & Arsitektur Project](#-struktur--arsitektur-project)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Panduan Instalasi & Penggunaan](#-panduan-instalasi--penggunaan)
- [Perintah Shell Script](#-perintah-shell-script)
- [Fitur Utama](#-fitur-utama)
- [API Endpoints](#-api-endpoints)
- [Database Schema](#-database-schema)
- [Troubleshooting](#-troubleshooting)

---

## 📖 Ringkasan Project

**Portofolio Project** adalah aplikasi web full-stack yang dibangun dengan Laravel 12 dan Filament Admin Panel. Aplikasi ini dirancang untuk mengelola dan menampilkan:

- **Profile Website**: Informasi situs dan profil pengguna
- **Manajemen Proyek**: CRUD operasi untuk proyek dengan dokumentasi lengkap
- **Pesan Kontak**: Manajemen pesan dari pengunjung website
- **Manajemen Pengguna**: Sistem autentikasi dan manajemen user dengan role-based access control
- **Admin Dashboard**: Dashboard interaktif dengan logging dan widget informatif

Teknologi yang digunakan mencakup Docker untuk containerization, MariaDB untuk database, Nginx sebagai web server, dan Tailwind CSS untuk styling modern.

---

## 🔄 Riwayat Commit (Git History)

Berikut adalah seluruh riwayat commit yang telah dilakukan pada project ini:

| Commit Hash | Pesan Commit | Author | Waktu |
|---|---|---|---|
| `bfcb79b` | Tambahkan Laporan | root | 4 hari lalu |
| `cfa4662` | Tambahkan Laporan | root | 4 hari lalu |
| `0273504` | Merge branch 'main' of github.com:zeronosA25/portofolio-2026 | root | 10 hari lalu |
| `8135035` | Tambahkan Laporan | root | 10 hari lalu |
| `a179a85` | Create README.md | Adit | 11 hari lalu |
| `4141065` | Tambahkan Laporan | root | 11 hari lalu |
| `9cf8abe` | first comit | root | 11 hari lalu |
| `2760dea` | 🎉 Initial commit | root | 11 hari lalu |

### Deskripsi Commit

- **Initial Commit**: Setup awal project dengan struktur Laravel
- **First Commit**: Implementasi fitur dasar dan konfigurasi
- **Laporan**: Penambahan dokumentasi dan laporan project
- **Create README.md**: Pembuatan file dokumentasi awal
- **Merge Branch**: Sinkronisasi dengan repository GitHub utama

---

## 🛠 Teknologi & Stack

### Backend
- **Framework**: Laravel 12.0+
- **Language**: PHP 8.2+
- **Admin Panel**: Filament 3.3+
- **Fitur Tambahan**:
  - `filament/filament` - Admin panel utama
  - `bezhansalleh/filament-shield` - Role-based access control
  - `z3d0x/filament-logger` - Activity logging
  - `awcodes/overlook` - UI enhancement
  - `hasnayeen/themes` - Theme management
  - `joaopaulolndev/filament-edit-profile` - User profile editor

### Frontend
- **Build Tool**: Vite 6.2+
- **CSS Framework**: Tailwind CSS 3.4+
- **JavaScript**: Axios untuk HTTP requests
- **Plugin**: 
  - `@tailwindcss/forms` - Form styling
  - `@tailwindcss/typography` - Typography utilities

### Database
- **Database Engine**: MariaDB 10.11
- **ORM**: Eloquent (Laravel)

### DevOps & Infrastructure
- **Containerization**: Docker & Docker Compose
- **Web Server**: Nginx (Alpine)
- **PHP Configuration**: PHP 8.2 dengan FPM
- **Port Mapping**:
  - HTTP: 80
  - HTTPS: 443
  - MySQL: 13306

### Development Tools
- **Testing**: Pest 3.8+ dengan Pest Plugin for Laravel
- **Code Quality**:
  - Laravel Pint (Code Styling)
  - Laravel IDE Helper (Type Hints)
  - Laravel Debugbar (Debugging)
- **Build**: PostCSS, Autoprefixer, Concurrently

---

## 📁 Struktur & Arsitektur Project

### Direktori Struktur Lengkap

```
portofolio/
├── docker-compose.yml          # Konfigurasi Docker multi-container
├── README.md                   # File dokumentasi ini
│
├── php/                        # Konfigurasi PHP & Docker
│   ├── Dockerfile             # Build image untuk PHP container
│   ├── docker-entrypoint.sh   # Script entrypoint container
│   ├── local.ini              # Konfigurasi PHP development
│   └── www.conf               # Konfigurasi PHP-FPM
│
├── nginx/                      # Konfigurasi Nginx web server
│   ├── Dockerfile             # Build image untuk Nginx container
│   ├── default.conf           # Konfigurasi virtual host
│   └── ssl/                   # Certificate SSL (jika ada)
│
├── db/                        # Data dan konfigurasi database
│   ├── conf.d/
│   │   └── my.cnf            # Konfigurasi MariaDB
│   └── data/                 # Volume data MySQL (diatur docker-compose)
│
├── docs/                      # Dokumentasi tambahan
│
└── src/                       # Source code Laravel (Application Root)
    ├── artisan                # Laravel CLI tool
    ├── composer.json          # PHP dependencies
    ├── package.json           # Node dependencies
    ├── phpunit.xml            # PHPUnit testing config
    ├── pint.json              # Laravel Pint config
    ├── postcss.config.js      # PostCSS config
    ├── tailwind.config.js     # Tailwind CSS config
    ├── vite.config.js         # Vite build config
    │
    ├── app/                   # Aplikasi logic
    │   ├── Console/
    │   │   └── Commands/      # Custom Artisan commands
    │   │       ├── Recache.php           # Cache clearing command
    │   │       ├── DevIde.php            # IDE helper command
    │   │       ├── ProjectInitialize.php # Project setup command
    │   │       └── ProjectUpdate.php     # Project update command
    │   │
    │   ├── Filament/          # Filament Admin Panel resources
    │   │   ├── Admin/
    │   │   │   ├── Resources/
    │   │   │   │   ├── UserResource.php           # User management
    │   │   │   │   ├── ProjectResource.php        # Project management
    │   │   │   │   ├── SiteProfileResource.php    # Site profile management
    │   │   │   │   └── ContactMessageResource.php # Message management
    │   │   │   │       └── Pages/                 # CRUD pages untuk resources
    │   │   │   │           ├── Create*
    │   │   │   │           ├── Edit*
    │   │   │   │           └── List*
    │   │   │   ├── Widgets/
    │   │   │   │   └── LatestAccessLogs.php # Dashboard widget
    │   │   │   └── Providers/
    │   │   │       └── AdminPanelProvider.php # Admin panel configuration
    │   │   └── Pages/
    │   │       └── Auth/
    │   │           └── EditProfile.php # User profile page
    │   │
    │   ├── Http/
    │   │   └── Controllers/   # API dan Web Controllers
    │   │       ├── Controller.php              # Base controller
    │   │       ├── ProjectController.php       # Proyek API/Web
    │   │       ├── SiteProfileController.php   # Site profile API/Web
    │   │       └── ContactMessageController.php # Message handling
    │   │
    │   ├── Models/            # Eloquent Models
    │   │   ├── User.php       # Model User
    │   │   ├── Project.php    # Model Project
    │   │   ├── SiteProfile.php # Model Site Profile
    │   │   └── ContactMessage.php # Model Contact Message
    │   │
    │   ├── Policies/          # Authorization policies
    │   │   └── *Policy.php    # Authorization rules
    │   │
    │   ├── Livewire/          # Livewire components (jika ada)
    │   │
    │   └── Providers/         # Service providers
    │       ├── AppServiceProvider.php    # App-wide services
    │       └── Filament/
    │           └── AdminPanelProvider.php # Filament configuration
    │
    ├── bootstrap/             # Bootstrap aplikasi
    │   ├── app.php           # Application bootstrap
    │   ├── providers.php     # Service provider bootstrap
    │   └── cache/            # Cache storage
    │
    ├── config/               # Konfigurasi aplikasi
    │   ├── app.php          # App config
    │   ├── auth.php         # Authentication config
    │   ├── cache.php        # Cache config
    │   ├── database.php     # Database config
    │   ├── filament.php     # Filament configuration
    │   ├── filament-shield.php # RBAC configuration
    │   ├── filament-logger.php # Logger configuration
    │   ├── filesystems.php  # File system configuration
    │   ├── mail.php         # Mail configuration
    │   ├── session.php      # Session configuration
    │   └── ... (other configs)
    │
    ├── database/
    │   ├── migrations/      # Database migrations
    │   ├── factories/       # Model factories
    │   └── seeders/         # Database seeders
    │
    ├── resources/
    │   ├── views/          # Blade templates
    │   ├── css/            # CSS files
    │   │   └── app.css
    │   └── js/             # JavaScript files
    │       ├── app.js
    │       └── bootstrap.js
    │
    ├── routes/
    │   ├── web.php         # Web routes
    │   ├── api.php         # API routes
    │   └── console.php     # Console routes
    │
    ├── storage/
    │   ├── app/           # Application storage
    │   ├── framework/     # Framework cache
    │   └── logs/          # Application logs
    │
    ├── tests/             # Test suite
    │   ├── Feature/       # Feature tests
    │   ├── Unit/          # Unit tests
    │   ├── Pest.php
    │   └── TestCase.php
    │
    ├── public/            # Public accessible files
    │   ├── index.php      # Application entry point
    │   ├── build/         # Vite compiled assets
    │   ├── css/           # Compiled CSS
    │   ├── js/            # Compiled JavaScript
    │   ├── images/        # Image assets
    │   ├── storage        # Symlink ke storage/app/public
    │   └── robots.txt
    │
    ├── lang/              # Localization files
    │   └── vendor/        # Vendor language files
    │
    └── vendor/            # Composer packages (auto-generated)
```

### Arsitektur Aplikasi (Architecture Diagram)

```
┌─────────────────────────────────────────────────────────────────┐
│                         FRONTEND LAYER                           │
│                   (HTML/CSS/JavaScript/Vite)                     │
├─────────────────────────────────────────────────────────────────┤
│                                                                   │
│  ┌──────────────────────┐        ┌──────────────────────┐        │
│  │   Public Website     │        │  Filament Admin      │        │
│  │  (Portofolio View)   │        │    Dashboard         │        │
│  │                      │        │                      │        │
│  │ - Projects Display   │        │ - User Management    │        │
│  │ - Contact Form       │        │ - Project CRUD       │        │
│  │ - About Section      │        │ - Message Inbox      │        │
│  │ - Skills Display     │        │ - Site Settings      │        │
│  └──────────────────────┘        └──────────────────────┘        │
│                                                                   │
├─────────────────────────────────────────────────────────────────┤
│                   APPLICATION LAYER (Laravel)                    │
├─────────────────────────────────────────────────────────────────┤
│                                                                   │
│  ┌────────────────────────────────────────────────────────┐     │
│  │              ROUTE LAYER                              │     │
│  │  ┌──────────────┐         ┌──────────────┐            │     │
│  │  │   Web Routes │         │   API Routes │            │     │
│  │  └──────────────┘         └──────────────┘            │     │
│  └────────────────────────────────────────────────────────┘     │
│                              ↓                                   │
│  ┌────────────────────────────────────────────────────────┐     │
│  │          CONTROLLER LAYER                             │     │
│  │  ┌─────────────────────────────────────────────────┐  │     │
│  │  │ ProjectController                              │  │     │
│  │  │ SiteProfileController                          │  │     │
│  │  │ ContactMessageController                       │  │     │
│  │  │ UserController (via Filament)                  │  │     │
│  │  └─────────────────────────────────────────────────┘  │     │
│  └────────────────────────────────────────────────────────┘     │
│                              ↓                                   │
│  ┌────────────────────────────────────────────────────────┐     │
│  │            MODEL LAYER (Eloquent ORM)                │     │
│  │  ┌──────────┐  ┌─────────┐  ┌────────────┐          │     │
│  │  │ User     │  │ Project │  │SiteProfile │          │     │
│  │  └──────────┘  └─────────┘  └────────────┘          │     │
│  │  ┌──────────────────┐                               │     │
│  │  │ ContactMessage   │                               │     │
│  │  └──────────────────┘                               │     │
│  └────────────────────────────────────────────────────────┘     │
│                              ↓                                   │
│  ┌────────────────────────────────────────────────────────┐     │
│  │          FILAMENT ADMIN PANEL                        │     │
│  │  ┌─────────────────────────────────────────────────┐  │     │
│  │  │ Resources | Widgets | Policies | Authorization │  │     │
│  │  │ Role-Based Access Control (Shield)             │  │     │
│  │  └─────────────────────────────────────────────────┘  │     │
│  └────────────────────────────────────────────────────────┘     │
│                                                                   │
├─────────────────────────────────────────────────────────────────┤
│                   PERSISTENCE LAYER                              │
├─────────────────────────────────────────────────────────────────┤
│                                                                   │
│              MariaDB 10.11 Database                              │
│  ┌──────────────────────────────────────────────────────┐       │
│  │ Tables:                                              │       │
│  │ ├── users (Autentikasi & User Management)           │       │
│  │ ├── projects (Manajemen Proyek)                     │       │
│  │ ├── site_profiles (Informasi Website)              │       │
│  │ ├── contact_messages (Pesan dari Pengunjung)        │       │
│  │ ├── roles (Role RBAC)                              │       │
│  │ ├── permissions (Permission RBAC)                  │       │
│  │ └── activity_log (Logging Aktivitas Admin)         │       │
│  └──────────────────────────────────────────────────────┘       │
│                                                                   │
└─────────────────────────────────────────────────────────────────┘

                    CONTAINER ORCHESTRATION
┌────────────────────────────────────────────────────────────────┐
│ Docker Compose dengan 3 Services:                              │
│ ├── PHP (PHP-FPM): Application engine                         │
│ ├── Nginx: Web server & reverse proxy                         │
│ └── MariaDB: Database server                                  │
└────────────────────────────────────────────────────────────────┘
```

### Model Relationships

```
User (1)
  ├─ hasMany: Projects
  └─ hasMany: ActivityLogs

Project (*)
  ├─ belongsTo: User
  └─ attributes: [title, slug, description, image, technologies, 
                  erd_image, flowchart_image, demo_url, github_url, 
                  is_published]

SiteProfile (1)
  └─ attributes: [site_name, hero_title, hero_description, 
                  about_title, about_image, skills, etc.]

ContactMessage (*)
  └─ attributes: [name, email, message, read_at]
```

---

## 💻 Persyaratan Sistem

### Minimum Requirements
- **OS**: Linux, macOS, atau Windows (dengan WSL/Docker Desktop)
- **Docker**: Version 20.10+
- **Docker Compose**: Version 2.0+
- **RAM**: 2GB minimum (4GB recommended)
- **Disk Space**: 2GB untuk images dan data

### Untuk Development Tanpa Docker
- **PHP**: 8.2 atau lebih tinggi
- **Composer**: Latest version
- **Node.js**: 18+ LTS
- **MySQL/MariaDB**: 10.11+
- **Git**: 2.0+

---

## 📚 Panduan Instalasi & Penggunaan

### Metode 1: Menggunakan Docker (Recommended)

#### Step 1: Clone Repository
```bash
git clone https://github.com/zeronosA25/portofolio-2026.git
cd portofolio-2026
```

#### Step 2: Setup Environment
```bash
# Copy environment file
cp src/.env.example src/.env

# Generate application key (optional if not using Docker)
cd src
php artisan key:generate
cd ..
```

#### Step 3: Build & Run Docker Containers
```bash
# Build images dan start containers
docker-compose up -d

# Atau dengan rebuild
docker-compose up -d --build
```

#### Step 4: Run Migrations & Seeders
```bash
# Run migrations
docker-compose exec php php artisan migrate

# Run seeders (jika ada)
docker-compose exec php php artisan db:seed
```

#### Step 5: Akses Aplikasi
- **Frontend**: http://localhost
- **Admin Panel**: http://localhost/admin
- **Default Credentials**: Gunakan credentials dari seeder atau buat user baru via:
  ```bash
  docker-compose exec php php artisan tinker
  # Di dalam tinker:
  # App\Models\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')])
  ```

#### Step 6: Install Dependencies (Jika diperlukan)
```bash
# Install PHP dependencies
docker-compose exec php composer install

# Install Node dependencies
docker-compose exec php npm install

# Build frontend assets
docker-compose exec php npm run build
```

---

### Metode 2: Setup Lokal (Tanpa Docker)

#### Step 1: Prerequisites
```bash
# Pastikan PHP 8.2+, Node 18+, dan MySQL installed
php --version
node --version
mysql --version
```

#### Step 2: Clone & Setup
```bash
git clone https://github.com/zeronosA25/portofolio-2026.git
cd portofolio-2026/src

# Install dependencies
composer install
npm install

# Copy environment file
cp .env.example .env

# Generate key
php artisan key:generate
```

#### Step 3: Database Setup
```bash
# Create database
mysql -u root -p -e "CREATE DATABASE portofolio;"

# Update .env dengan database credentials
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=portofolio
# DB_USERNAME=root
# DB_PASSWORD=your_password

# Run migrations
php artisan migrate
```

#### Step 4: Start Development Server
```bash
# Terminal 1 - Start Laravel dev server
php artisan serve

# Terminal 2 - Start Vite dev server
npm run dev
```

#### Step 5: Access Application
- **Frontend**: http://127.0.0.1:8000
- **Admin Panel**: http://127.0.0.1:8000/admin

---

## 🚀 Perintah Shell Script

### 1. Quick Start Script (Automated Setup)

#### `setup.sh` - Setup awal project
```bash
#!/bin/bash
set -e

echo "🚀 Starting Portofolio Project Setup..."

# Build dan start containers
echo "📦 Building and starting Docker containers..."
docker-compose up -d --build

# Wait untuk containers siap
echo "⏳ Waiting for services to be ready..."
sleep 10

# Run migrations
echo "🗄️  Running database migrations..."
docker-compose exec -T php php artisan migrate

# Install Node dependencies jika belum
echo "📚 Installing frontend dependencies..."
docker-compose exec -T php npm install

# Build frontend assets
echo "🎨 Building frontend assets..."
docker-compose exec -T php npm run build

# Generate IDE helper
echo "🧠 Generating IDE helpers..."
docker-compose exec -T php php artisan ide-helper:generate 2>/dev/null || true

echo "✅ Setup complete!"
echo "🌐 Access your application at:"
echo "   Frontend: http://localhost"
echo "   Admin: http://localhost/admin"
```

#### `start.sh` - Start containers
```bash
#!/bin/bash
docker-compose up -d
echo "✅ Project containers started!"
echo "🌐 Frontend: http://localhost"
echo "📊 Admin: http://localhost/admin"
```

#### `stop.sh` - Stop containers
```bash
#!/bin/bash
docker-compose down
echo "✅ Project containers stopped!"
```

#### `restart.sh` - Restart containers
```bash
#!/bin/bash
docker-compose restart
echo "✅ Project containers restarted!"
```

---

### 2. Database Management Scripts

#### `db-migrate.sh` - Run database migrations
```bash
#!/bin/bash
docker-compose exec php php artisan migrate
echo "✅ Database migrations completed!"
```

#### `db-rollback.sh` - Rollback last migration
```bash
#!/bin/bash
docker-compose exec php php artisan migrate:rollback
echo "✅ Database rollback completed!"
```

#### `db-fresh.sh` - Fresh database (warning: destructive!)
```bash
#!/bin/bash
read -p "⚠️  This will delete all data! Continue? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    docker-compose exec php php artisan migrate:fresh
    docker-compose exec php php artisan db:seed 2>/dev/null || true
    echo "✅ Database refreshed!"
else
    echo "Cancelled"
fi
```

#### `db-backup.sh` - Backup database
```bash
#!/bin/bash
BACKUP_DIR="./backups"
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
BACKUP_FILE="$BACKUP_DIR/portofolio_backup_$TIMESTAMP.sql"

mkdir -p $BACKUP_DIR

docker-compose exec -T db mysqldump -uroot -pp455w0rd portofolio > $BACKUP_FILE
echo "✅ Database backup saved to: $BACKUP_FILE"
```

---

### 3. Development Scripts

#### `dev.sh` - Start development environment
```bash
#!/bin/bash
echo "🚀 Starting development environment..."

# Start containers
docker-compose up -d

# Start Vite dev server
docker-compose exec php npm run dev &

# Start Laravel dev tools
docker-compose exec php php artisan tinker

echo "✅ Development environment started!"
```

#### `logs.sh` - View application logs
```bash
#!/bin/bash
# Real-time logs dari Laravel
docker-compose logs -f php
```

#### `shell.sh` - Access PHP shell
```bash
#!/bin/bash
docker-compose exec php sh
```

#### `php-shell.sh` - Access Laravel Tinker
```bash
#!/bin/bash
docker-compose exec php php artisan tinker
```

---

### 4. Code Quality Scripts

#### `lint.sh` - Run code linting
```bash
#!/bin/bash
echo "🔍 Running code linting with Pint..."
docker-compose exec php vendor/bin/pint
echo "✅ Linting complete!"
```

#### `test.sh` - Run tests
```bash
#!/bin/bash
echo "🧪 Running tests..."
docker-compose exec php ./vendor/bin/pest
echo "✅ Tests completed!"
```

#### `ide-helper.sh` - Generate IDE helpers
```bash
#!/bin/bash
echo "🧠 Generating IDE helpers..."
docker-compose exec php php artisan ide-helper:generate
docker-compose exec php php artisan ide-helper:models --write-mixin
echo "✅ IDE helpers generated!"
```

---

### 5. Deployment & Cleanup Scripts

#### `deploy.sh` - Prepare for deployment
```bash
#!/bin/bash
echo "📦 Preparing for deployment..."

# Run migrations
docker-compose exec php php artisan migrate --force

# Clear caches
docker-compose exec php php artisan config:cache
docker-compose exec php php artisan view:cache
docker-compose exec php php artisan route:cache

# Build assets
docker-compose exec php npm run build

echo "✅ Deployment preparation complete!"
```

#### `clean.sh` - Clean up project
```bash
#!/bin/bash
read -p "⚠️  This will remove all containers and volumes! Continue? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    docker-compose down -v
    echo "✅ Cleanup complete!"
else
    echo "Cancelled"
fi
```

#### `cache-clear.sh` - Clear all caches
```bash
#!/bin/bash
docker-compose exec php php artisan cache:clear
docker-compose exec php php artisan config:clear
docker-compose exec php php artisan view:clear
docker-compose exec php php artisan route:clear
echo "✅ All caches cleared!"
```

---

### 6. Comprehensive Makefile (Alternative)

Jika prefer menggunakan `make`, buat file `Makefile`:

```makefile
.PHONY: help setup start stop restart logs shell php-shell \
        migrate migrate-fresh lint test clean deploy

help:
	@echo "📚 Available commands:"
	@echo "  make setup         - Initial project setup"
	@echo "  make start         - Start containers"
	@echo "  make stop          - Stop containers"
	@echo "  make restart       - Restart containers"
	@echo "  make logs          - View logs"
	@echo "  make shell         - Access shell"
	@echo "  make php-shell     - Access Laravel Tinker"
	@echo "  make migrate       - Run migrations"
	@echo "  make migrate-fresh - Fresh database"
	@echo "  make lint          - Run linting"
	@echo "  make test          - Run tests"
	@echo "  make clean         - Clean up project"
	@echo "  make deploy        - Prepare deployment"

setup:
	docker-compose up -d --build
	sleep 10
	docker-compose exec -T php php artisan migrate
	docker-compose exec -T php npm install
	docker-compose exec -T php npm run build

start:
	docker-compose up -d
	@echo "✅ Containers started"

stop:
	docker-compose down
	@echo "✅ Containers stopped"

restart:
	docker-compose restart
	@echo "✅ Containers restarted"

logs:
	docker-compose logs -f php

shell:
	docker-compose exec php sh

php-shell:
	docker-compose exec php php artisan tinker

migrate:
	docker-compose exec php php artisan migrate

migrate-fresh:
	docker-compose exec php php artisan migrate:fresh
	docker-compose exec php php artisan db:seed 2>/dev/null || true

lint:
	docker-compose exec php vendor/bin/pint

test:
	docker-compose exec php ./vendor/bin/pest

clean:
	docker-compose down -v

deploy:
	docker-compose exec php php artisan migrate --force
	docker-compose exec php php artisan config:cache
	docker-compose exec php npm run build
```

**Penggunaan:**
```bash
make help          # Lihat semua commands
make setup         # Setup awal
make start         # Start containers
make logs          # View logs
```

---

## ⚙️ Common Commands Reference

### Docker Commands
```bash
# Start dengan auto-build
docker-compose up -d --build

# Stop all containers
docker-compose down

# View logs
docker-compose logs -f php

# Execute command di container
docker-compose exec php [command]

# Rebuild images
docker-compose build --no-cache
```

### Laravel Artisan Commands
```bash
# Database
php artisan migrate                 # Run migrations
php artisan migrate:rollback        # Rollback migrations
php artisan migrate:fresh           # Fresh database
php artisan db:seed                 # Run seeders

# Cache
php artisan cache:clear             # Clear cache
php artisan config:cache            # Cache config
php artisan route:cache             # Cache routes
php artisan view:cache              # Cache views

# Development
php artisan serve                   # Start dev server
php artisan tinker                  # Interactive shell
php artisan ide-helper:generate     # Generate IDE helpers

# Maintenance
php artisan optimize                # Optimize application
php artisan down                    # Maintenance mode on
php artisan up                      # Maintenance mode off

# Testing
php artisan test                    # Run tests
php artisan pest                    # Run Pest tests
```

### NPM Commands
```bash
npm run dev     # Start development server
npm run build   # Build for production
npm install     # Install dependencies
npm update      # Update dependencies
```

---

## 📌 Fitur Utama

### 1. **Manajemen Pengguna**
- Registrasi dan login user
- Edit profil pengguna
- Role-based access control (Filament Shield)
- Manajemen permissions dan roles

### 2. **Manajemen Proyek**
- CRUD operasi lengkap
- Upload gambar project
- ERD dan flowchart documentation
- Technology stack tracking
- Demo URL dan GitHub link
- Publish/unpublish feature

### 3. **Site Profile Management**
- Informasi website terpusat
- Hero section configuration
- About section dengan multiple description
- Skills array management
- Image management

### 4. **Manajemen Pesan Kontak**
- Receive contact messages dari website
- Mark as read/unread
- Manage inquiries dan feedback

### 5. **Admin Dashboard**
- Activity logging system
- Latest access logs widget
- User statistics
- Theme customization dengan Themes package
- Beautiful UI dengan Filament

### 6. **Security Features**
- Laravel Sanctum (API authentication)
- CSRF protection
- SQL injection prevention
- XSS protection via Blade templating
- Role-based authorization policies

---

## 🔌 API Endpoints

### Projects API
```
GET     /api/projects              # List semua projects
GET     /api/projects/{id}         # Detail project
POST    /api/projects              # Create project (Admin only)
PUT     /api/projects/{id}         # Update project (Admin only)
DELETE  /api/projects/{id}         # Delete project (Admin only)
```

### Site Profile API
```
GET     /api/site-profile          # Get site profile
POST    /api/site-profile          # Create/update profile
```

### Contact Messages API
```
GET     /api/messages              # List messages
POST    /api/messages              # Submit contact form
GET     /api/messages/{id}         # Detail message
```

### Web Routes
```
GET     /                          # Homepage
GET     /projects                  # Projects listing
GET     /projects/{slug}           # Project detail
POST    /contact                   # Submit contact form
GET     /admin                     # Admin dashboard (login required)
```

---

## 🗄️ Database Schema

### Users Table
```sql
id, name, email, email_verified_at, password, 
avatar, phone, bio, address, remember_token, 
created_at, updated_at
```

### Projects Table
```sql
id, title, slug, description, image, erd_image, 
flowchart_image, demo_url, github_url, 
technologies (JSON), is_published, 
created_at, updated_at
```

### Site Profiles Table
```sql
id, site_name, hero_subtitle, hero_title, 
hero_description, hero_button_text, about_title, 
about_image, about_heading, about_description_1, 
about_description_2, about_description_3, 
skills (JSON), created_at, updated_at
```

### Contact Messages Table
```sql
id, name, email, subject, message, 
read_at, created_at, updated_at
```

---

## 🐛 Troubleshooting

### 1. Container Gagal Start
```bash
# Clean up dan rebuild
docker-compose down -v
docker-compose up -d --build
```

### 2. Permission Denied di storage/logs
```bash
docker-compose exec php chmod -R 777 storage bootstrap/cache
```

### 3. Database Connection Error
```bash
# Check if database is running
docker-compose ps

# View database logs
docker-compose logs db
```

### 4. Port Already in Use
```bash
# Find process using port 80
lsof -i :80

# Atau ubah port di docker-compose.yml:
# ports:
#   - "8080:80"
```

### 5. Out of Memory
```bash
# Increase Docker memory limit di Docker Desktop settings
# Atau ubah di docker-compose dengan:
# php:
#   deploy:
#     resources:
#       limits:
#         memory: 2G
```

### 6. Migrations Failing
```bash
# Check migration files
docker-compose exec php php artisan migrate:status

# Rollback semua
docker-compose exec php php artisan migrate:reset

# Re-migrate
docker-compose exec php php artisan migrate
```

---

## 📞 Support & Kontribusi

Untuk issues, questions, atau suggestions:
- Buat issue di GitHub repository
- Email: [your-email]
- GitHub: [zeronosA25](https://github.com/zeronosA25)

---

## 📄 License

Project ini dilisensikan di bawah MIT License - lihat file LICENSE untuk detail.

---

## 👨‍💻 Author

**Muhammad Aditya**
- NIM: 20240801234
- GitHub: [@zeronosA25](https://github.com/zeronosA25)
- Project: Portofolio Management System (2026)

---

**Terakhir diupdate:** 29 Mei 2026
