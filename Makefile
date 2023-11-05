build:
	docker compose build 
	cd user-service && docker compose build 
	cd user-service && cd userdb && docker compose build 

up:
	docker compose up -d
	cd user-service && docker compose up -d
	cd user-service && cd userdb && docker compose up -d 
down: 
	docker compose down 
	cd user-service && docker compose down 
	cd user-service && cd userdb && docker compose down

user-service-shell:
	cd user-service && docker compose exec -it user-service-php bash
	