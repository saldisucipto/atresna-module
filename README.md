# Laravel 8 + Stisla + Jetstream + Livewire
we love Stisla Admin Template and Laravel 8 let's make them love each other.

[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/nyancodeid/laravel-8-stisla-jetstream/issues)

## What inside?
- Laravel ^8.5 - [laravel.com/docs/8.x](https://laravel.com/docs/8.x)
- Laravel Jetstream ^1.2 - [jetstream.laravel.com](https://jetstream.laravel.com/)
- Livewire ^2.0 - [laravel-livewire.com](https://laravel-livewire.com)
- Stisla Admin Template ^2.3.0 - [getstisla.com](https://getstisla.com/)

Include simple Data Table with Livewire (CRUD).

## What next?
After clone or download this repository, next step is install all dependency required by laravel and laravel-mix.

```shell
# install composer-dependency
$ composer install
# install npm package
$ npm install
# build dev 
$ npm run dev
```

Before we start web server make sure we already generate app key, configure `.env` file and do migration.

```shell
# create copy of .env
$ cp .env.example .env
# create laravel key
$ php artisan key:generate
# laravel migrate
$ php artisan migrate
```
Issues Integrated With PHP 8.

```shell
# edit composer.json  run composer install
$ composer install --ignore-platform-reqs
```


