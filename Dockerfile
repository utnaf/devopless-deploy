FROM php:8.0

WORKDIR /var/www

# install PHP stuff
RUN apt-get update \
    && apt-get install -y zip libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql

# create `var` directory and add writing permissions
RUN mkdir var \
   && chmod 755 -R var \
   && chown www-data:www-data -R var

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-scripts

EXPOSE 8000

CMD php -S 0.0.0.0:8000 -t public