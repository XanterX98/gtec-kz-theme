#!/bin/bash
# Импортирует БД с прода в локалку и заменяет URL
set -e

source "$(dirname "$0")/../.env"

DUMP_FILE="/tmp/gtec_prod_$(date +%Y%m%d_%H%M%S).sql"

echo "[1/4] Экспорт БД с прода ($PROD_HOST)..."
ssh -p "$PROD_PORT" "$PROD_USER@$PROD_HOST" \
  "cd $PROD_PATH && docker exec gtec_db mysqldump -u$DB_USER -p$DB_PASSWORD $DB_NAME" \
  > "$DUMP_FILE"

echo "[2/4] Импорт в локальную БД..."
docker exec -i gtec_db mysql -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < "$DUMP_FILE"

echo "[3/4] Замена URL: $PROD_URL → $LOCAL_URL"
docker exec gtec_wordpress wp search-replace "$PROD_URL" "$LOCAL_URL" \
  --all-tables --precise --quiet

echo "[4/4] Очистка кэша..."
docker exec gtec_wordpress wp cache flush --quiet 2>/dev/null || true

rm -f "$DUMP_FILE"
echo "✓ Готово. Открыть: $LOCAL_URL"
