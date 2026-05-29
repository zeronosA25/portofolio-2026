#!/bin/bash

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

BACKUP_DIR="./backups"
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
BACKUP_FILE="$BACKUP_DIR/portofolio_backup_$TIMESTAMP.sql"

mkdir -p "$BACKUP_DIR"

echo -e "${BLUE}Creating database backup...${NC}"
docker-compose exec -T db mysqldump -uroot -pp455w0rd portofolio > "$BACKUP_FILE"

echo ""
echo -e "${GREEN}✅ Database backup saved!${NC}"
echo -e "${BLUE}Location: ${YELLOW}$BACKUP_FILE${NC}"
echo ""
