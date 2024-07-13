# Laravel 11 API Starterkit using Sanctum

Simple API App and Token Based Authentication for SPA/Mobile Apps

## Core Feature
- Registration
- Login
- Check User Token

## Installation

First, you need to clone this repository :
```bash
git clone https://github.com/copycodeid/laravel-11-api-sanctum-starterkit.git
```

Install all dependencies on `composer.json` :
```bash
composer install
```

Copy all variables from `.env.example` to `.env` :
```bash
cp .env.example .env
```

Generate `APP_KEY`:
```bash
php artisan key:generate
```

Run the application with default :
```bash
php artisan serve
```
or using custom Host and Port :
```bash
php artisan serve --host=localhost --port=8000
```

## Customization
For Authentication Routes it will on `routes/auth.php`

All business logic for Authentication are separate from the Controller unless for this files :
- LogoutController
- CheckUserTokenController

So if you want to customize the auth logic, you can go to `app/Repository/AuthRepository.php`and you will find this methods :
- Register Method
- Login Method