##################
# Docker compose
##################

build:
	cp .env.example .env
	docker-compose build

cp_env:
	cp .env.example .env

up:
	docker-compose up -d

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
