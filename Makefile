build:
	docker build -t utnaf/awesome.app:latest . && docker push utnaf/awesome.app:latest

deploy:
	ssh utnaf@192.168.1.104 './deploy.sh'

bd: build deploy