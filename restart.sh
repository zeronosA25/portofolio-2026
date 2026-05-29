#!/bin/bash

# Colors
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}Restarting Portofolio Project Containers...${NC}"
docker-compose restart

echo ""
echo -e "${GREEN}✅ Project containers restarted!${NC}"
echo ""
echo -e "${BLUE}🌐 Application URLs:${NC}"
echo -e "   Frontend: ${GREEN}http://localhost${NC}"
echo -e "   Admin Panel: ${GREEN}http://localhost/admin${NC}"
echo ""
