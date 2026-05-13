#!/bin/bash
# Отправляет локальную БД на прод и заменяет URL
set -e

source "$(dirname "$0")/../.env"

DUMP_FILE="/tmp/gtec_local_$(date +%Y%m%d_%H%M%S).sql"

# Подтверждение — прод будет перезаписан
echo "⚠ Внимание: БД на проде ($PROD_HOST) будет ПЕРЕЗАПИСАНА локальной."
read -p "Продолжить? [y/N] " -n 1 -r
echo
[[ ! $REPLY =~ ^[Yy]$ ]] && echo "Отменено." && exit 0

echo "[1/4] Экспорт локальной БД..."
docker exec gtec_db mysqldump -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" > "$DUMP_FILE"

echo "[2/4] Загрузка дампа на сервер..."
scp -P "$PROD_PORT" "$DUMP_FILE" "$PROD_USER@$PROD_HOST:/tmp/gtec_push.sql"

echo "[3/4] Импорт на проде..."
ssh -p "$PROD_PORT" "$PROD_USER@$PROD_HOST" \
  "cd $PROD_PATH && \
   docker exec -i gtec_db mysql -u$DB_USER -p$DB_PASSWORD $DB_NAME < /tmp/gtec_push.sql && \
   docker exec gtec_wordpress wp search-replace '$LOCAL_URL' '$PROD_URL' --all-tables --precise --quiet && \
   docker exec gtec_wordpress wp cache flush --quiet 2>/dev/null || true && \
   rm /tmp/gtec_push.sql"

rm -f "$DUMP_FILE"
echo "✓ Готово. Сайт: $PROD_URL"
