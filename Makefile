dev:
	docker compose up -d --remove-orphans
	symfony server:start

test:
	php bin/phpunit

build:
	docker build -t utnaf/awesome.app:latest .
	docker push utnaf/awesome.app:latest

deploy:
	ssh utnaf@awesome-app.prod './deploy.sh'

bd: build deploy