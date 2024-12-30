# Usar la última versión de Ubuntu como base
FROM ubuntu:latest

# Establecer el entorno no interactivo para evitar prompts durante la instalación
ENV DEBIAN_FRONTEND=noninteractive

# Actualizar paquetes y agregar herramientas necesarias
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y apache2 mysql-server php libapache2-mod-php php-mysql php-curl php-xml curl unzip git && \
    apt-get clean

# Descargar e instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite

# Configurar Apache para que escuche en el puerto 80
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copiar un archivo PHP básico para probar el servidor
RUN echo "<?php phpinfo(); ?>" > /var/www/html/index.php

# Configurar MySQL (script de inicialización)
COPY mysql-init.sql /docker-entrypoint-initdb.d/

WORKDIR /var/www/html/

RUN mkdir laravel-api

WORKDIR /var/www/html/laravel-api

RUN git clone https://github.com/jloriag/CommerceFlow-API.git .

RUN composer update

RUN composer install

COPY .env /var/www/html/laravel-api

#RUN php artisan migrate --force

# Exponer los puertos necesarios (cambia el puerto de Apache y MySQL)
EXPOSE 8081 3307

# Comando para iniciar Apache y MySQL al iniciar el contenedor
CMD service mysql start && apachectl -D FOREGROUND
