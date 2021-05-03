dev:
	docker compose up -d --remove-orphans
	symfony server:start

test:
	php bin/phpunit