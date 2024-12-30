-- Cambiar la contraseña del usuario root
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';

-- Crear base de datos y usuario para Laravel
CREATE DATABASE laravel;
CREATE USER 'laravel'@'%' IDENTIFIED BY 'laravel';
GRANT ALL PRIVILEGES ON laravel.* TO 'laravel'@'%';
FLUSH PRIVILEGES;
