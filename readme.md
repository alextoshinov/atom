# Laravel 5.4 test project for Atom Solutions Ltd.
# My Library

[Live demo test App] (http://78.128.71.92/)
username: admin
password: secret

# Requirements
PHP >= 5.6<br/>
OpenSSL PHP Extension<br/>
PDO PHP Extension<br/>
Mbstring PHP Extension<br/>
Tokenizer PHP Extension<br/>

Instalation
===========
1. Clone this repository in your web folder<br/>
git clone https://github.com/alextoshinov/atom<br/>
2. Go to atom folder and edit .env file : <br/>
DB_DATABASE=atom<br/>
DB_USERNAME=root<br/>
DB_PASSWORD=alex<br/>

cd atom/<br/>
chmod -R 777 bootstrap/cache storage/ public/images<br/>
composer install<br/>
yarn or npm install<br/>
npm run dev<br/>
php artisan migrate --seed<br/>
php artisan config:cache<br/>
