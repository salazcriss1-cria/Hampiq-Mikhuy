FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    nodejs \
    npm

RUN docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Asegurar permisos correctos para almacenamiento y archivos públicos
RUN chown -R www-data:www-data /var/www/storage /var/www/public \
    && chmod -R 775 /var/www/storage /var/www/public

RUN composer install --no-dev --optimize-autoloader

# Instalar dependencias de Node.js y compilar los assets de Vite
RUN npm install && npm run build

EXPOSE 8000

CMD touch database/database.sqlite && php artisan migrate --force && php artisan config:clear && php artisan cache:clear && php artisan route:clear && php artisan serve --host=0.0.0.0 --port=8000