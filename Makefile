setup:
	docker-compose pull
	docker-compose build
	cp .env.example .env
	make seed
	docker-compose up -d

seed:
	docker-compose up -d databasebravi
	docker-compose up -d app
	docker-compose run --rm app composer install
	docker-compose run --rm app php artisan migrate --seed