# Laravel 5.4 test project for Atom Solutions Ltd.
# My Library

[Live demo test App] (http://78.128.71.92/)
username: admin
password: secret

# Requirements
PHP >= 5.6
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension

Instalation
===========
1. Clone this repository in your web folder
git clone https://github.com/alextoshinov/atom
2. Go to atom folder and edit .env file : 
DB_DATABASE=atom
DB_USERNAME=root
DB_PASSWORD=alex

cd atom/
chmod -R 777 bootstrap/cache storage/ public/images
composer install
yarn or npm install
npm run dev
php artisan migrate --seed
php artisan config:cache
