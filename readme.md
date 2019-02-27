My Library
========



Demo
====

Demo URL: http://78.128.71.92
username: admin
password: secret

Instalation
===========

git clone https://github.com/alextoshinov/atom
cd atom/
chmod -R 777 bootstrap/cache storage/ public/images
composer install
yarn or npm install
npm run dev
php artisan migrate --seed
php artisan config:cache
