# Volunteer App

[![Build Status](https://travis-ci.org/innesm4/volunteer-app.svg)](https://travis-ci.org/innesm4/volunteer-app)

## Installation instructions

composer must be updated to install defined Laravel Packages & Dependencys
```
composer update
```
## App Key

Generate a new authorisation key:
```
php artisan key:generate
```
## Permissions:

chmod 777 app/storage/sessions/

## Migrate the Schema

http://four.laravel.com/docs/migrations

php artisan migrate