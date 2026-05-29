#!/bin/bash

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}Generating IDE helpers...${NC}"
docker-compose exec php php artisan ide-helper:generate

echo -e "${YELLOW}Generating model hints...${NC}"
docker-compose exec php php artisan ide-helper:models --write-mixin

echo ""
echo -e "${GREEN}✅ IDE helpers generated!${NC}"
echo ""
