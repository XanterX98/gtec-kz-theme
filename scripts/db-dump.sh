#!/bin/bash
set -e

source "$(dirname "$0")/../.env"

FILE="${1:-backups/dump_$(date +%Y%m%d_%H%M%S).sql}"
mkdir -p "$(dirname "$FILE")"

docker exec gtec_db mysqldump -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" > "$FILE"
echo "✓ Дамп сохранён: $FILE"
