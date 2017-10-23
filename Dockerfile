FROM atoto/docker-nginx-php-stack:php-7.1.9

COPY . /var/www/html

RUN composer install --no-dev --no-scripts --optimize-autoloader && \
    chown -R www-data:www-data /var/www && \
    chmod -R 777 var/*

USER www-data
