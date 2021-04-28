dev:
	docker compose up -d --remove-orphans
	symfony server:start

build:
	docker build -t utnaf/awesome.app:latest .
	docker push utnaf/awesome.app:latest

deploy:
	ssh utnaf@192.168.1.106 './deploy.sh'

bd: build deploy