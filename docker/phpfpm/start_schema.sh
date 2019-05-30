#!/usr/bin/env sh

artisan=$(/usr/bin/find /var/www -name artisan)

# Migrate database if artisan exists
if [ -f ${artisan} ]; then
    /usr/bin/php ${artisan} migrate:fresh
    # Dev - populate db with test data
    # /usr/bin/php ${artisan} db:seed
fi
