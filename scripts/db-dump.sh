#!/bin/bash
set -e

cd "$(dirname "$0")/.."
source .env

FILE="${1:-backups/dump_$(date +%Y%m%d_%H%M%S).sql}"
mkdir -p "$(dirname "$FILE")"

docker compose exec -T db mysqldump -h 127.0.0.1 -u"$DB_USER" -p"$DB_PASSWORD" --no-tablespaces "$DB_NAME" > "$FILE"
echo "✓ Дамп сохранён: $FILE"
