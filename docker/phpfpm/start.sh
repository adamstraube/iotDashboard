#!/usr/bin/env sh

artisan=$(/usr/bin/find /var/www -name artisan)

# Migrate database if artisan exists
if [ -f ${artisan} ]; then
    /usr/bin/php ${artisan} migrate:fresh
fi

/usr/sbin/php-fpm7 -F 2>&1 | awk '{ gsub(/WARNING: \[pool www\] child [0-9]+ said into stderr: /, "PHP-FPM: "); print }' > /dev/stdout