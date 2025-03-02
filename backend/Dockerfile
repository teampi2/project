FROM php:8.2-apache

RUN apt-get update && apt-get install -y unzip curl libmariadb-dev nano
RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

COPY ./ /var/www/html

COPY ./.docker/apache/apache-config.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN cd /var/www/html && php artisan key:generate

EXPOSE 80
