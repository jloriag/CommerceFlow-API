FROM bitnami/apache:latest

USER root

# Crear el directorio necesario y luego instalar nano
RUN mkdir -p /var/lib/apt/lists/partial && \
    apt-get update && \
    apt-get install -y nano && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Instalar PHP y módulos necesarios
RUN install_packages \
    php \
    php-cli \
    php-common \
    libapache2-mod-php \
    php-mysql \
    php-curl \
    php-json \
    php-mbstring \
    php-xml \
    php-zip

# Instalar curl
RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*


# Descargar e instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Establece el directorio de trabajo
WORKDIR /opt/bitnami/apache2/htdocs

RUN mkdir laravel11-app 

# Copia los archivos de tu proyecto al contenedor (opcional)
COPY ../ /opt/bitnami/apache2/htdocs/laravel11-app

# Establece el directorio de trabajo
WORKDIR /opt/bitnami/apache2/htdocs/laravel11-app

# Ajusta los permisos del directorio
RUN chmod -R 775 /opt/bitnami/apache2/htdocs && \
    chown -R daemon:daemon /opt/bitnami/apache2/htdocs

RUN composer update

# Exponer el puerto 8081 ( para la imagen de Bitnami Apache)
EXPOSE 8081

# Reiniciar Apache
RUN /opt/bitnami/scripts/apache/stop.sh && /opt/bitnami/scripts/apache/start.sh