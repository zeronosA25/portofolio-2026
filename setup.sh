#!/bin/bash
set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}╔════════════════════════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║     🚀 Portofolio Project - Initial Setup Script           ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════════════════════════╝${NC}"
echo ""

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
    echo -e "${RED}❌ Docker is not installed. Please install Docker first.${NC}"
    exit 1
fi

if ! command -v docker-compose &> /dev/null; then
    echo -e "${RED}❌ Docker Compose is not installed. Please install Docker Compose first.${NC}"
    exit 1
fi

echo -e "${YELLOW}📦 Building and starting Docker containers...${NC}"
docker-compose up -d --build

echo -e "${YELLOW}⏳ Waiting for services to be ready (10 seconds)...${NC}"
sleep 10

# Check if PHP container is ready
echo -e "${YELLOW}🔍 Checking if PHP container is ready...${NC}"
for i in {1..30}; do
    if docker-compose exec -T php php artisan --version > /dev/null 2>&1; then
        echo -e "${GREEN}✓ PHP container is ready${NC}"
        break
    fi
    echo -ne "${YELLOW}⏳ Waiting... ($i/30)${NC}\r"
    sleep 1
done

# Run migrations
echo -e "${YELLOW}🗄️  Running database migrations...${NC}"
docker-compose exec -T php php artisan migrate --force

# Install Node dependencies
echo -e "${YELLOW}📚 Installing frontend dependencies...${NC}"
docker-compose exec -T php npm install

# Build frontend assets
echo -e "${YELLOW}🎨 Building frontend assets...${NC}"
docker-compose exec -T php npm run build

# Generate IDE helper
echo -e "${YELLOW}🧠 Generating IDE helpers...${NC}"
docker-compose exec -T php php artisan ide-helper:generate 2>/dev/null || true

# Clear caches
echo -e "${YELLOW}🧹 Clearing caches...${NC}"
docker-compose exec -T php php artisan cache:clear
docker-compose exec -T php php artisan config:clear

echo ""
echo -e "${GREEN}╔════════════════════════════════════════════════════════════╗${NC}"
echo -e "${GREEN}║     ✅ Setup Complete!                                     ║${NC}"
echo -e "${GREEN}╚════════════════════════════════════════════════════════════╝${NC}"
echo ""
echo -e "${BLUE}🌐 Application URLs:${NC}"
echo -e "${GREEN}   Frontend: http://localhost${NC}"
echo -e "${GREEN}   Admin Panel: http://localhost/admin${NC}"
echo ""
echo -e "${BLUE}📝 Next Steps:${NC}"
echo -e "  1. Create an admin user:"
echo -e "     ${YELLOW}docker-compose exec php php artisan tinker${NC}"
echo -e "     ${YELLOW}App\\Models\\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')])${NC}"
echo ""
echo -e "  2. View logs:"
echo -e "     ${YELLOW}docker-compose logs -f php${NC}"
echo ""
echo -e "  3. Access shell:"
echo -e "     ${YELLOW}docker-compose exec php sh${NC}"
echo ""
echo -e "${BLUE}ℹ️  For more commands, check the README.md file${NC}"
echo ""
