
FROM php:7.2-apache

# https://github.com/docker-library/php/issues/391#issuecomment-346590029
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# https://stackoverflow.com/questions/48868357/docker-php-apache-container-set-the-servername-directive-globally
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY . /var/www/html/
