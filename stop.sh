#!/bin/bash

# Colors
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}Stopping Portofolio Project Containers...${NC}"
docker-compose down

echo ""
echo -e "${GREEN}✅ Project containers stopped!${NC}"
echo ""
