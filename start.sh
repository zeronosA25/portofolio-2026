#!/bin/bash

# Colors
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}Starting Portofolio Project Containers...${NC}"
docker-compose up -d

echo ""
echo -e "${GREEN}✅ Project containers started!${NC}"
echo ""
echo -e "${BLUE}🌐 Access your application at:${NC}"
echo -e "   Frontend: ${GREEN}http://localhost${NC}"
echo -e "   Admin Panel: ${GREEN}http://localhost/admin${NC}"
echo ""
echo -e "${BLUE}View logs with: ${GREEN}docker-compose logs -f php${NC}"
echo ""
