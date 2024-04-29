## Required versions

- PHP -> 8.2
- MySQL -> 8.0

## Installation

Copy env.example file into .env

Set values in .env file

```bash
    DB_CONNECTION
    DB_HOST
    DB_PORT
    DB_DATABASE
    DB_USERNAME
    DB_PASSWORD
```

```bash
    MAIL_MAILER
    MAIL_HOST
    MAIL_PORT
    MAIL_USERNAME
    MAIL_PASSWORD
    MAIL_ENCRYPTION
    MAIL_FROM_ADDRESS
    MAIL_FROM_NAME
```

## Run commands

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```
