FROM php:7.4-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
COPY ./.env.example /var/www/html/.env
WORKDIR /var/www/html
RUN composer install \
   --ignore-platform-reqs \
   --no-interaction \
   --no-plugins \
   --no-scripts \
   --prefer-dist

RUN php artisan key:generate
RUN chmod -R 777 storage
RUN chmod -R 777 bootstrap/cache/
RUN a2enmod rewrite
RUN service apache2 restart
