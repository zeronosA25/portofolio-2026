#!/bin/bash

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}╔════════════════════════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║     📦 Preparing for Deployment                           ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════════════════════════╝${NC}"
echo ""

echo -e "${YELLOW}⚠️  Deployment Steps:${NC}"
echo ""

echo -e "${YELLOW}1️⃣  Running migrations...${NC}"
docker-compose exec php php artisan migrate --force

echo -e "${YELLOW}2️⃣  Caching configuration...${NC}"
docker-compose exec php php artisan config:cache

echo -e "${YELLOW}3️⃣  Caching routes...${NC}"
docker-compose exec php php artisan route:cache

echo -e "${YELLOW}4️⃣  Caching views...${NC}"
docker-compose exec php php artisan view:cache

echo -e "${YELLOW}5️⃣  Building frontend assets...${NC}"
docker-compose exec php npm run build

echo -e "${YELLOW}6️⃣  Optimizing application...${NC}"
docker-compose exec php php artisan optimize

echo ""
echo -e "${GREEN}╔════════════════════════════════════════════════════════════╗${NC}"
echo -e "${GREEN}║     ✅ Deployment Preparation Complete!                   ║${NC}"
echo -e "${GREEN}╚════════════════════════════════════════════════════════════╝${NC}"
echo ""
echo -e "${BLUE}📋 Deployment Checklist:${NC}"
echo -e "  ✓ Database migrated"
echo -e "  ✓ Configuration cached"
echo -e "  ✓ Routes cached"
echo -e "  ✓ Views cached"
echo -e "  ✓ Frontend assets built"
echo -e "  ✓ Application optimized"
echo ""
