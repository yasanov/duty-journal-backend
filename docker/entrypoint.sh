#!/bin/sh
set -e

if [ ! -f .env ]; then
    cp .env.example .env
fi

if [ ! -d vendor ]; then
    composer install --no-interaction --prefer-dist
fi

php artisan key:generate --ansi --force --no-interaction >/dev/null 2>&1 || true

exec "$@"
