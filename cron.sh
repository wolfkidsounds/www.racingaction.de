#!/bin/bash

# lokale änderungen werden zwischengespeichert
git stash

# lädt die aktuellen änderungen herunter
git fetch --all

# setzt alle daten auf den zustand von "orgin/master" zurück
git reset --hard origin/master

# installiert php abhängigkeiten mittels composer
composer install --no-interaction

# installiert node abhängigkeiten mittels npm
npm install

# build command für npm
npm run build

# lässt lokale änderungen fallen
git stash drop --all