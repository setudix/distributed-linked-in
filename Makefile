build:
	docker compose build 
	# cd post-service && docker compose build 
	# cd post-service && cd postdb && docker compose build 
	cd user-service && docker compose build --no-cache user-service-nginx-node
	cd user-service && cd userdb && docker compose build 
	# cd reverse-proxy && docker compose build 

up:
	docker compose up -d	
	# cd post-service && docker compose up -d 
	# cd post-service && cd postdb && docker compose up -d 
	cd user-service && docker compose up -d
	cd user-service && cd userdb && docker compose up -d 
	# cd reverse-proxy && docker compose up -d 
down: 
	docker compose down 
	# cd post-service && docker compose down 
	# cd post-service && cd postdb && docker compose down 
	cd user-service && docker compose down 
	cd user-service && cd userdb && docker compose down
	# cd reverse-proxy && docker compose down 

	
user-service-shell:
	cd user-service && docker compose exec -it user-service-php bash

npm-user-service-shell:
	cd user-service && docker compose exec -it user-service-nginx-node sh
# post-service-shell:
# 	cd post-service && docker compose exec -it post-service-php bash