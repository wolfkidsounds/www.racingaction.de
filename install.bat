@echo off

::installiert composer pakete und bringt sie auf den neusten stand
call composer install --no-interaction
::call composer update --no-interaction

::installiert php flasher
::call php bin/console flasher:install

::installiert node pakete und bringt sie auf den neusten stand
call npm install --no-interaction
::call npm update --no-interaction

:: datenbank-migrationen
call php bin/console --no-interaction doctrine:migrations:migrate