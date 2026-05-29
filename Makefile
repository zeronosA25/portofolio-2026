.PHONY: help setup start stop restart logs shell tinker \
        migrate migrate-fresh db-backup lint test ide-helper \
        cache-clear deploy clean build dev

# Default target
help:
	@echo "╔════════════════════════════════════════════════════════════╗"
	@echo "║     📚 Portofolio Project - Available Commands             ║"
	@echo "╚════════════════════════════════════════════════════════════╝"
	@echo ""
	@echo "Setup & Running:"
	@echo "  make setup              - Initial project setup (all-in-one)"
	@echo "  make start              - Start containers"
	@echo "  make stop               - Stop containers"
	@echo "  make restart            - Restart containers"
	@echo ""
	@echo "Development:"
	@echo "  make dev                - Start development environment"
	@echo "  make logs               - View application logs"
	@echo "  make shell              - Access container shell"
	@echo "  make tinker             - Access Laravel Tinker"
	@echo ""
	@echo "Database:"
	@echo "  make migrate            - Run migrations"
	@echo "  make migrate-fresh      - Fresh database (WARNING: data loss)"
	@echo "  make db-backup          - Backup database"
	@echo ""
	@echo "Code Quality:"
	@echo "  make lint               - Run linting with Pint"
	@echo "  make test               - Run test suite"
	@echo "  make ide-helper         - Generate IDE helpers"
	@echo ""
	@echo "Maintenance:"
	@echo "  make cache-clear        - Clear all caches"
	@echo "  make build              - Build frontend assets"
	@echo "  make deploy             - Prepare for deployment"
	@echo "  make clean              - Clean up project (WARNING: data loss)"
	@echo ""

# Setup & Running
setup:
	@chmod +x setup.sh
	@./setup.sh

start:
	@chmod +x start.sh
	@./start.sh

stop:
	@chmod +x stop.sh
	@./stop.sh

restart:
	@chmod +x restart.sh
	@./restart.sh

dev:
	@docker-compose up -d
	@echo "🚀 Development environment started"
	@echo "Frontend: http://localhost"
	@echo "Admin: http://localhost/admin"

logs:
	@chmod +x logs.sh
	@./logs.sh

shell:
	@chmod +x shell.sh
	@./shell.sh

tinker:
	@chmod +x tinker.sh
	@./tinker.sh

# Database
migrate:
	@chmod +x migrate.sh
	@./migrate.sh

migrate-fresh:
	@chmod +x fresh-db.sh
	@./fresh-db.sh

db-backup:
	@chmod +x backup-db.sh
	@./backup-db.sh

# Code Quality
lint:
	@chmod +x lint.sh
	@./lint.sh

test:
	@chmod +x test.sh
	@./test.sh

ide-helper:
	@chmod +x ide-helper.sh
	@./ide-helper.sh

# Maintenance
cache-clear:
	@chmod +x cache-clear.sh
	@./cache-clear.sh

build:
	@docker-compose exec php npm run build
	@echo "✅ Frontend assets built"

deploy:
	@chmod +x deploy.sh
	@./deploy.sh

clean:
	@chmod +x clean.sh
	@./clean.sh
