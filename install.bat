@echo off

::installiert composer pakete
call composer install

::installiert node pakete
call npm install

:: database migrations
call php bin/console --no-interaction doctrine:migrations:migrate