#!/bin/bash
set -e

cd "$(dirname "$0")/.."
source .env

FILE="${1:-backups/dump_$(date +%Y%m%d_%H%M%S).sql}"
mkdir -p "$(dirname "$FILE")"

docker compose exec -T db mysqldump -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" > "$FILE"
echo "✓ Дамп сохранён: $FILE"
