#!/bin/bash
set -e

cd "$(dirname "$0")/.."
source .env

FILE="$1"

if [[ -z "$FILE" ]]; then
  echo "Использование: make db-import FILE=backups/dump.sql"
  exit 1
fi

if [[ ! -f "$FILE" ]]; then
  echo "Файл не найден: $FILE"
  exit 1
fi

docker compose exec -T db mysql -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < "$FILE"
echo "✓ Импортирован: $FILE"
