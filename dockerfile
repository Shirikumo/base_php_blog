FROM php:7.2-fpm

LABEL maintainer="Theo Dalleau"

RUN docker-php-ext-install pdo pdo_mysql