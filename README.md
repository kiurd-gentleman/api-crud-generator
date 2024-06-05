# API CRUD generator package 

## Installation process

1. Composer install
```bash
composer install
```
after that copy the .env.example file to .env and set the database credentials

```bash
cp .env.example .env
```
after that generate the key
```bash
php artisan key:generate
```
for the technical task package we need to install the package
```bash
composer require krimt/api-first-crud-package
```
For resource publish run the following command
```bash
php artisan vendor:publish --tag=stubs
```
after that run the following command
```bash
php artisan crud:generate {name}
```
name would be the name of the model, controller, request and migration file

after run this command you will see the following files in the following directories and api routes will be added in the routes/api.php file


