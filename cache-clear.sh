#!/bin/bash

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}Clearing all caches...${NC}"

echo -e "${YELLOW}Clearing application cache...${NC}"
docker-compose exec php php artisan cache:clear

echo -e "${YELLOW}Clearing config cache...${NC}"
docker-compose exec php php artisan config:clear

echo -e "${YELLOW}Clearing view cache...${NC}"
docker-compose exec php php artisan view:clear

echo -e "${YELLOW}Clearing route cache...${NC}"
docker-compose exec php php artisan route:clear

echo ""
echo -e "${GREEN}✅ All caches cleared!${NC}"
echo ""
