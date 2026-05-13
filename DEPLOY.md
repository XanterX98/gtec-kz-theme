# Деплой

Пуш в `main` → сайт обновляется автоматически.

## Первоначальная настройка (один раз)

### 1. Добавить секреты на GitHub

Открыть репозиторий → **Settings → Secrets and variables → Actions → New repository secret**

Добавить 4 секрета:

| Имя | Значение |
|-----|----------|
| `SERVER_HOST` | IP-адрес сервера |
| `SERVER_USER` | SSH-пользователь (например `ubuntu` или `root`) |
| `SERVER_SSH_KEY` | Приватный SSH-ключ (см. ниже) |
| `SERVER_PORT` | `22` |

**Как получить приватный ключ:**
```bash
cat ~/.ssh/id_rsa
```
Скопировать всё содержимое включая строки `-----BEGIN/END-----`.

### 2. Развернуть на сервере

Зайти на сервер по SSH и выполнить:

```bash
git clone https://github.com/XanterX98/gtec-kz-theme /var/www/gtec.kz
cd /var/www/gtec.kz
cp .env.example .env
nano .env          # заполнить пароли
make up
```

Всё. После этого деплой происходит сам при каждом `git push origin main`.
