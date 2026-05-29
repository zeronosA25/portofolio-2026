#!/bin/bash

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${RED}╔════════════════════════════════════════════════════════════╗${NC}"
echo -e "${RED}║     ⚠️  WARNING: This will remove all containers!         ║${NC}"
echo -e "${RED}╚════════════════════════════════════════════════════════════╝${NC}"
echo ""
echo -e "${YELLOW}This action will:${NC}"
echo "  • Stop all running containers"
echo "  • Remove all containers"
echo "  • Remove all volumes (data loss!)"
echo ""
echo -e "${YELLOW}Are you sure you want to continue? (yes/no)${NC}"
read -r response

if [ "$response" != "yes" ]; then
    echo -e "${BLUE}Cancelled.${NC}"
    exit 0
fi

echo -e "${RED}🗑️  Removing containers and volumes...${NC}"
docker-compose down -v

echo ""
echo -e "${GREEN}✅ Cleanup complete!${NC}"
echo -e "${BLUE}You can now start fresh with: ${YELLOW}./setup.sh${NC}"
echo ""
