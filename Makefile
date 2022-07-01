##################
# Docker compose
##################

build:
	cp .env.example .env
	docker-compose build

up:
	docker-compose up -d
	docker-compose run --rm app composer install

ps:
	docker-compose ps

down:
	docker-compose down -v --remove-orphans

##################
# App
##################

app_bash:
	docker-compose exec app bash

##################
# Database
##################

migrate:
	docker-compose run --rm app php artisan migrate
