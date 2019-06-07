#!/usr/bin/env bash

artisan=$(/usr/bin/find /var/www -name artisan)

/usr/local/bin/composer dump-autoload

# Migrate database if artisan exists
if [ -f ${artisan} ]; then
    /usr/bin/php ${artisan} migrate:fresh
    /usr/bin/php ${artisan} db:seed
fi