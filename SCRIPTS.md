# 🛠️ Shell Scripts Guide - Portofolio Project

Quick reference guide untuk menjalankan semua shell scripts yang tersedia di project ini.

## 📋 Daftar Script

### 🚀 Setup & Running Scripts

#### `setup.sh` - Setup Awal Project (Recommended untuk first time)
```bash
./setup.sh
# atau
bash setup.sh
```
**Fungsi:**
- Build dan start Docker containers
- Run database migrations
- Install frontend dependencies
- Build frontend assets
- Generate IDE helpers
- Clear all caches

**Waktu:** ~2-5 menit (tergantung internet speed)

---

#### `start.sh` - Start Containers
```bash
./start.sh
```
**Fungsi:** Start semua Docker containers

**Akses:**
- Frontend: http://localhost
- Admin: http://localhost/admin

---

#### `stop.sh` - Stop Containers
```bash
./stop.sh
```
**Fungsi:** Stop semua running containers

---

#### `restart.sh` - Restart Containers
```bash
./restart.sh
```
**Fungsi:** Restart semua containers

---

### 🗄️ Database Scripts

#### `migrate.sh` - Run Migrations
```bash
./migrate.sh
```
**Fungsi:** Jalankan pending database migrations

---

#### `fresh-db.sh` - Fresh Database
```bash
./fresh-db.sh
```
**Fungsi:** 
- Reset semua migrations
- Run migrations dari awal
- Run database seeders

⚠️ **WARNING:** Akan menghapus semua data existing!

---

#### `backup-db.sh` - Backup Database
```bash
./backup-db.sh
```
**Fungsi:** Backup database ke file SQL

**Output:** `./backups/portofolio_backup_YYYYMMDD_HHMMSS.sql`

---

### 👨‍💻 Development Scripts

#### `logs.sh` - View Application Logs
```bash
./logs.sh
```
**Fungsi:** 
- View real-time application logs
- Dari Laravel container

**Keluar:** Tekan `Ctrl+C`

---

#### `shell.sh` - Access Container Shell
```bash
./shell.sh
```
**Fungsi:** 
- Akses shell dari PHP container
- Bisa jalankan semua commands di container

**Keluar:** Ketik `exit`

---

#### `tinker.sh` - Access Laravel Tinker
```bash
./tinker.sh
```
**Fungsi:** 
- Interactive Laravel shell
- Execute PHP code directly
- Akses models, migrations, dll

**Contoh:**
```php
# Di dalam tinker:
>>> App\Models\Project::count()
>>> App\Models\User::create(['name' => 'Test', 'email' => 'test@example.com', 'password' => bcrypt('password')])
>>> exit
```

**Keluar:** Ketik `exit`

---

### 🔍 Code Quality Scripts

#### `lint.sh` - Run Code Linting
```bash
./lint.sh
```
**Fungsi:** 
- Run Laravel Pint code formatter
- Auto-fix code style issues
- Check PHP code quality

---

#### `test.sh` - Run Test Suite
```bash
./test.sh

# Atau dengan specific test file:
./test.sh tests/Unit/ProjectTest.php

# Atau dengan specific method:
./test.sh --filter testCreateProject
```
**Fungsi:** 
- Jalankan Pest test suite
- Unit tests & Feature tests

---

#### `ide-helper.sh` - Generate IDE Helpers
```bash
./ide-helper.sh
```
**Fungsi:** 
- Generate autocomplete hints untuk IDE
- Improve code editor experience
- Generate model mixins

---

### 🧹 Maintenance Scripts

#### `cache-clear.sh` - Clear All Caches
```bash
./cache-clear.sh
```
**Fungsi:** 
- Clear application cache
- Clear config cache
- Clear view cache
- Clear route cache

---

#### `deploy.sh` - Prepare for Deployment
```bash
./deploy.sh
```
**Fungsi:** 
1. Run migrations
2. Cache configuration
3. Cache routes
4. Cache views
5. Build frontend assets
6. Optimize application

**Gunakan sebelum:** Deploy ke production

---

#### `clean.sh` - Complete Cleanup
```bash
./clean.sh
```
**Fungsi:** 
- Remove semua containers
- Remove semua volumes
- Delete database

⚠️ **WARNING:** Ini destructive! Data akan hilang permanently!

---

## 📚 Using Makefile (Alternative)

Jika prefer menggunakan `make` command, gunakan `Makefile` yang sudah tersedia:

```bash
# Lihat semua available commands
make help

# Setup awal
make setup

# Start containers
make start

# Run migrations
make migrate

# View logs
make logs

# Clear cache
make cache-clear

# Run tests
make test

# Deploy
make deploy
```

---

## 🎯 Common Workflows

### First Time Setup
```bash
./setup.sh
```
Ini akan handle semua setup otomatis.

---

### Development Workflow
```bash
# Start containers
./start.sh

# View logs di tab terminal lain
./logs.sh

# Access shell jika butuh
./shell.sh

# Access tinker untuk interactive shell
./tinker.sh

# Jalankan tests
./test.sh

# Lint code
./lint.sh
```

---

### Before Deployment
```bash
# Lint code
./lint.sh

# Run tests
./test.sh

# Deploy
./deploy.sh

# Backup database (optional)
./backup-db.sh
```

---

### Database Management
```bash
# Backup database
./backup-db.sh

# Run pending migrations
./migrate.sh

# Fresh database (WARNING: data loss)
./fresh-db.sh

# Access tinker
./tinker.sh
```

---

## 🐛 Troubleshooting

### Scripts tidak bisa di-execute
```bash
chmod +x *.sh
```

### Permission Denied saat backup database
```bash
# Run dengan sudo atau check container permissions
docker-compose exec php chmod -R 777 storage bootstrap/cache
```

### Container not running
```bash
# Check status
docker-compose ps

# Start containers
./start.sh
```

### Database migrations failed
```bash
# Check migration status
./shell.sh
# Di dalam shell: php artisan migrate:status

# Rollback last migration
docker-compose exec php php artisan migrate:rollback

# Try fresh
./fresh-db.sh
```

---

## 💡 Tips & Tricks

### Jalankan Artisan Command Langsung
```bash
docker-compose exec php php artisan [command]
```

Contoh:
```bash
docker-compose exec php php artisan make:model Project -m
docker-compose exec php php artisan make:controller ProjectController
docker-compose exec php php artisan make:migration create_projects_table
```

### Jalankan NPM Command Langsung
```bash
docker-compose exec php npm [command]
```

Contoh:
```bash
docker-compose exec php npm install
docker-compose exec php npm run dev
docker-compose exec php npm run build
```

### Jalankan Composer Command Langsung
```bash
docker-compose exec php composer [command]
```

Contoh:
```bash
docker-compose exec php composer install
docker-compose exec php composer update
docker-compose exec php composer require [package-name]
```

---

## 📖 More Information

Untuk informasi lebih lengkap, lihat:
- [README.md](./README.md) - Dokumentasi lengkap
- [docker-compose.yml](./docker-compose.yml) - Docker configuration
- [src/.env](./src/.env) - Environment variables

---

**Last Updated:** 29 Mei 2026
