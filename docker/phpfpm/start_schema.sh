#!/usr/bin/env sh

artisan=$(/usr/bin/find /var/www -name artisan)

# Migrate database if artisan exists
if [ -f ${artisan} ]; then
    /usr/bin/php ${artisan} doctrine:clear:metadata:cache
    /usr/bin/php ${artisan} doctrine:migrations:migrate
fi
