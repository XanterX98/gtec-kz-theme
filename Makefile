.PHONY: up down restart logs shell ps db-pull db-push db-dump db-import

up:
	docker compose up -d

down:
	docker compose down

restart:
	docker compose restart

logs:
	docker compose logs -f

ps:
	docker compose ps

shell:
	docker exec -it gtec_wordpress bash

db-pull:
	@bash scripts/db-pull.sh

db-push:
	@bash scripts/db-push.sh

db-dump:
	@bash scripts/db-dump.sh $(FILE)

db-import:
	@bash scripts/db-import.sh $(FILE)

wp-cli:
	docker exec -it gtec_wordpress bash -c "curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp"
