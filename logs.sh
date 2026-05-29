#!/bin/bash

# Colors
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}Viewing application logs (Press Ctrl+C to exit)...${NC}"
echo ""
docker-compose logs -f php
