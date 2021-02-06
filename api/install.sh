#!/bin/sh

if [ -f .env ]; then

  rm .env

fi

cp .env.example .env

composer install

chmod -R 777 vendor
chmod 777 .env
chmod -R 777 storage/logs

php-fpm
