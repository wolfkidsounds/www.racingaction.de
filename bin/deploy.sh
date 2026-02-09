#!/bin/bash

set -e

PROJECT_ROOT="/home/pulsationaudio-deploy/htdocs/deploy.pulsationaudio.com"
PHP_BIN="/usr/bin/php8.2"
APP_USER="pulsationaudio-deploy"

cd "$PROJECT_ROOT"

echo "======================================"
echo " Deploy gestartet: $(date)"
echo "======================================"

echo ">>> Composer install"
composer install \
  --no-dev \
  --optimize-autoloader \
  --no-interaction

echo ">>> Doctrine migrations"
$PHP_BIN bin/console doctrine:migrations:migrate \
  --no-interaction \
  --all-or-nothing

echo ">>> Cache clear"
$PHP_BIN bin/console cache:clear

echo ">>> Cache warmup"
$PHP_BIN bin/console cache:warmup

echo ">>> Dateirechte setzen"
chown -R $USER:$USER var
chown -R $USER:$USER public

echo "======================================"
echo " Deployment erfolgreich abgeschlossen"
echo "======================================"
