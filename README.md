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
make shell         # bash внутри WordPress контейнера
make theme-update  # обновить тему с GitHub (git pull)
make wp-cli        # установить WP-CLI внутри контейнера
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

## Тема

Тема **WebStudio** клонирована из [XanterX98/gtec-kz-theme](https://github.com/XanterX98/gtec-kz-theme)
и смонтирована в контейнер как volume — изменения в `./themes/gtec-kz-theme/` применяются сразу без перезапуска.

Активировать: `Внешний вид → Темы → WebStudio → Активировать`

## Данные (volumes)

- `gteckz_db_data` — данные MySQL (сохраняются между перезапусками)
- `gteckz_wp_data` — файлы WordPress (плагины, загрузки и т.д.)

Удалить все данные и начать заново:
```bash
docker compose down -v
make up
```
