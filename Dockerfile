FROM php:8.3-fpm

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala Node.js (LTS)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Crea directorio de trabajo
WORKDIR /var/www/html

# Copia archivos del proyecto (omitido si usas bind mount)
# COPY . .

# Permite que el contenedor arranque con el usuario correcto
RUN useradd -u 1000 -m laravel

# Cambia permisos
RUN chown -R laravel:laravel /var/www/html
