build:
	docker compose build 
	cd user-service && docker compose build 

up:
	docker compose up -d
	cd user-service && docker compose up -d

down: 
	docker compose down 
	cd user-service && docker compose down 
