FROM php:8.2-apache

RUN apt-get update && apt-get install -y unzip curl libmariadb-dev
RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

COPY ./ /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN a2enmod rewrite
RUN service apache2 restart

EXPOSE 8000
