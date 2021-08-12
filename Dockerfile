FROM php:7.2-apache
RUN apt-get update && apt-get install sudo nano
RUN docker-php-ext-install pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
ADD configs/000-default.conf /etc/apache2/sites-available
CMD ["/bin/bash"]