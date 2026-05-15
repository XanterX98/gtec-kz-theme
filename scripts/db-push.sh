#!/bin/bash
# Отправляет локальную БД на прод и заменяет URL
set -e

cd "$(dirname "$0")/.."
source .env

DUMP_FILE="/tmp/gtec_local_$(date +%Y%m%d_%H%M%S).sql"

echo "⚠ Внимание: БД на проде ($PROD_HOST) будет ПЕРЕЗАПИСАНА локальной."
read -p "Продолжить? [y/N] " -n 1 -r
echo
[[ ! $REPLY =~ ^[Yy]$ ]] && echo "Отменено." && exit 0

echo "[1/4] Экспорт локальной БД..."
docker compose exec -T db mysqldump -h 127.0.0.1 -u"$DB_USER" -p"$DB_PASSWORD" --no-tablespaces "$DB_NAME" > "$DUMP_FILE"

echo "[2/4] Загрузка дампа на сервер..."
scp -P "$PROD_PORT" "$DUMP_FILE" "$PROD_USER@$PROD_HOST:/tmp/gtec_push.sql"

echo "[3/4] Импорт на проде..."
ssh -p "$PROD_PORT" "$PROD_USER@$PROD_HOST" \
  "cd $PROD_PATH && \
   docker compose exec -T db mysql -h 127.0.0.1 -u$DB_USER -p$DB_PASSWORD $DB_NAME < /tmp/gtec_push.sql && \
   docker compose exec -T wordpress wp search-replace '$LOCAL_URL' '$PROD_URL' --all-tables --precise --quiet && \
   docker compose exec -T wordpress wp cache flush --quiet 2>/dev/null || true && \
   rm /tmp/gtec_push.sql"

rm -f "$DUMP_FILE"
echo "✓ Готово. Сайт: $PROD_URL"
