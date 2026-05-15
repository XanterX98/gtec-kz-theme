#!/bin/bash
set -e

source "$(dirname "$0")/../.env"

FILE="$1"

if [[ -z "$FILE" ]]; then
  echo "Использование: make db-import FILE=backups/dump.sql"
  exit 1
fi

if [[ ! -f "$FILE" ]]; then
  echo "Файл не найден: $FILE"
  exit 1
fi

docker exec -i gtec_db mysql -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < "$FILE"
echo "✓ Импортирован: $FILE"
