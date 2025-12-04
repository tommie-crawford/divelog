#!/bin/sh
set -e

# Zorg dat Nginx niet als daemon draait (foreground)
# (staat meestal al zo in /etc/nginx/nginx.conf, maar voor de zekerheid)
sed -i 's/daemon on;/daemon off;/' /etc/nginx/nginx.conf 2>/dev/null || true

# Start PHP-FPM op de achtergrond
php-fpm -D

# Start Nginx in de foreground (houdt de container "in leven")
nginx
