#!/bin/bash

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}Running Database Migrations...${NC}"
docker-compose exec php php artisan migrate

echo ""
echo -e "${GREEN}✅ Database migrations completed!${NC}"
echo ""
