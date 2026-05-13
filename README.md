# gtec.kz — WordPress (Docker)

## Сервисы

| Сервис      | URL                        | Логин / Пароль           |
|-------------|----------------------------|--------------------------|
| WordPress   | http://localhost:8082      | задаётся при установке   |
| phpMyAdmin  | http://localhost:8083      | `gtec_user` / `gtec_pass_2024` |
| MySQL       | `localhost:3306` (внутри сети: `db:3306`) | см. `.env` |

## Команды

### Контейнеры

```bash
make up          # запустить все контейнеры
make down        # остановить и удалить контейнеры
make restart     # перезапустить контейнеры
make ps          # статус контейнеров
make logs        # логи в реальном времени (Ctrl+C для выхода)
```

### Разработка

```bash
make shell     # bash внутри WordPress контейнера
make wp-cli    # установить WP-CLI внутри контейнера (один раз)
```

### Docker напрямую

```bash
# Логи конкретного сервиса
docker compose logs -f wordpress
docker compose logs -f db

# Перезапуск одного сервиса
docker compose restart wordpress

# Войти в контейнер БД
docker exec -it gtec_db mysql -u gtec_user -pgtec_pass_2024 gtec_wp
```

## Деплой

Деплой происходит автоматически при пуше в ветку `main` через GitHub Actions.

### Первоначальная настройка

Добавить секреты в репозитории: **Settings → Secrets and variables → Actions → New repository secret**

| Secret | Описание |
|--------|----------|
| `SERVER_HOST` | IP или домен сервера |
| `SERVER_USER` | Пользователь SSH (например `ubuntu`) |
| `SERVER_SSH_KEY` | Приватный SSH-ключ (содержимое `~/.ssh/id_rsa`) |
| `SERVER_PORT` | SSH-порт (обычно `22`) |

На сервере нужно единоразово:
```bash
git clone https://github.com/XanterX98/gtec-kz-theme /var/www/gtec.kz
cd /var/www/gtec.kz
cp .env.example .env  # заполнить пароли
make up
```

После этого каждый `git push origin main` → автодеплой.

## Миграция БД

```bash
make db-pull   # прод → локалка
make db-push   # локалка → прод (спросит подтверждение)
```

**Перед первым запуском** заполнить в `.env`:
```
PROD_HOST=xxx.xxx.xxx.xxx
PROD_USER=ubuntu
```

**WP-CLI** должен быть установлен в контейнере — один раз:
```bash
make wp-cli
```

### Как это работает

1. Делает `mysqldump` на источнике
2. Импортирует на цели
3. Заменяет все URL через `wp search-replace` — WordPress хранит URL в сериализованных PHP-объектах, простой `sed` их сломает
4. Сбрасывает кэш

## Тема

Тема **WebStudio** находится в `wp-content/themes/gtec-kz-theme/` и версионируется вместе с проектом. Изменения применяются сразу — директория смонтирована в контейнер через bind mount.

Активировать: `Внешний вид → Темы → WebStudio → Активировать`

## Данные (volumes)

- `gteckz_db_data` — данные MySQL (сохраняются между перезапусками)
- `gteckz_wp_data` — файлы WordPress (плагины, загрузки и т.д.)

Удалить все данные и начать заново:
```bash
docker compose down -v
make up
```
