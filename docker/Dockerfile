FROM php:7.2-fpm

## docker-php-ext-install mcrypt libmcrypt-dev
RUN apt-get update && apt-get install -y libssl1.0-dev nano git wget xz-utils\
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo_mysql mbstring bcmath 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/empleados

# Use the default production configuration
RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini
