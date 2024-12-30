docker build -t ubuntu-laravel-lamp .
docker rm -f laravel-container
docker run -d -p 8081:80 -p 3307:3306 --name laravel-container ubuntu-laravel-lamp
timeout /t 5
docker exec -it laravel-container bash -c "mysql -u root -proot < docker/mysql-init.sql"
docker exec -it laravel-container bash -c "php artisan key:generate"
docker exec -it laravel-container bash -c "php artisan migrate --force"
docker exec -it laravel-container bash
