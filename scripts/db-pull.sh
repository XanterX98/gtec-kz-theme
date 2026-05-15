#!/bin/bash
# Импортирует БД с прода в локалку и заменяет URL
set -e

cd "$(dirname "$0")/.."
source .env

DUMP_FILE="/tmp/gtec_prod_$(date +%Y%m%d_%H%M%S).sql"

echo "[1/4] Экспорт БД с прода ($PROD_HOST)..."
ssh -p "$PROD_PORT" "$PROD_USER@$PROD_HOST" "
  cd $PROD_PATH
  source .env
  docker compose exec -T db mysqldump -h 127.0.0.1 -u\$DB_USER -p\$DB_PASSWORD --no-tablespaces \$DB_NAME
" > "$DUMP_FILE"

echo "[2/4] Импорт в локальную БД..."
docker compose exec -T db mysql -h 127.0.0.1 -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < "$DUMP_FILE"

echo "[3/4] Замена URL: $PROD_URL → $LOCAL_URL"
docker compose exec -T wordpress wp search-replace "$PROD_URL" "$LOCAL_URL" \
  --all-tables --precise --quiet

echo "[4/4] Очистка кэша..."
docker compose exec -T wordpress wp cache flush --quiet 2>/dev/null || true

rm -f "$DUMP_FILE"
echo "✓ Готово. Открыть: $LOCAL_URL"
