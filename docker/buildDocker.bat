docker build -t ubuntu-laravel-lamp .
docker rm -f laravel-container
docker run -d -p 8081:80 -p 3307:3306 --name laravel-container ubuntu-laravel-lamp
docker exec -it laravel-container bash