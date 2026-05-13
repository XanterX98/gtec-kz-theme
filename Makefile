.PHONY: up down restart logs shell theme-update ps

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

theme-update:
	git submodule update --remote wp-content/themes/gtec-kz-theme

wp-cli:
	docker exec -it gtec_wordpress bash -c "curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp"
