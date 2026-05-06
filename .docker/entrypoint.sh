#!/bin/bash
set -e

if [ -d /var/www/html/banksampahpedia ]; then
  chown -R www-data:www-data /var/www/html/banksampahpedia || true
fi

exec "$@"
