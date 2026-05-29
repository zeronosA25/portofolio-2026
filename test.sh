#!/bin/bash

# Colors
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}Running test suite with Pest...${NC}"
docker-compose exec php ./vendor/bin/pest "$@"

echo ""
echo -e "${GREEN}✅ Tests completed!${NC}"
echo ""
