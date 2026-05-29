#!/bin/bash

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${RED}⚠️  WARNING: This will delete all data from the database!${NC}"
echo -e "${YELLOW}Are you sure you want to continue? (yes/no)${NC}"
read -r response

if [ "$response" != "yes" ]; then
    echo -e "${BLUE}Cancelled.${NC}"
    exit 0
fi

echo -e "${BLUE}Refreshing database...${NC}"
docker-compose exec php php artisan migrate:fresh

echo -e "${YELLOW}Running seeders...${NC}"
docker-compose exec php php artisan db:seed 2>/dev/null || echo "No seeders to run"

echo ""
echo -e "${GREEN}✅ Database refreshed!${NC}"
echo ""
