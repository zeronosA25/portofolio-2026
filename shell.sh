#!/bin/bash

# Colors
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}Accessing PHP container shell...${NC}"
echo -e "${BLUE}Type 'exit' to exit${NC}"
echo ""
docker-compose exec php sh
