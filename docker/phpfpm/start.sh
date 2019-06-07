#!/usr/bin/env sh

/usr/sbin/php-fpm7 -F 2>&1 | awk '{ gsub(/WARNING: \[pool www\] child [0-9]+ said into stderr: /, "PHP-FPM: "); print }' > /dev/stdout