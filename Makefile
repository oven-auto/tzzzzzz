#BACK UP
dump-base:
	sudo docker exec mysql /mnt/mysql/backup/scripts.sh

migrate:
	sudo docker exec php-fpm_test php artisan migrate

migrate-rollback:
	sudo docker exec php-fpm_test php artisan migrate:rollback

perm:
	sudo docker exec php-fpm_test chmod -R 777 storage
	sudo docker exec php-fpm_test chmod -R 777 bootstrap
	sudo chmod -R 777 app

