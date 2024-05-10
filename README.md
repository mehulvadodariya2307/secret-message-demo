## Definition 

# Assessment Developer - Secret message

At CablesAndKits we primarily use PHP for our development.

We're very interested to see how you develop. Having something in a working fashion is
secondary to be being able to explain why you did what you did. 

This is because we believe that anyone can learn a language, framework and ecosystem 
surrounding a language/framework. The hard parts are explaining choices you made, following
design patterns and writing human-readable code. 

## Requirements

- Use Git versioning system
- You must include instructions on how to run your application.
- It should be able to run on the latest PHP and MySQL/sqlite.

Make sure to upload your project to Github and provide us with
the (public) link to be able to clone it.

_**Spend an approximate maximum of 4 hours on the assignment**_

_Remember: your choices of how to work matter more than the final product_

### Optional things

- Use a framework of choice
- If instructions are needed for us to run your project, make sure to include them in the ReadMe
- Have the project be (partially) tested

## Assignment

Be able to share an encrypted message with a colleague. 

Message: 

- text
- recipient
- created at

Expiry:

- read once, then delete
- delete after X period

Reading Message:

- Provide identifier for message
- Provide decryption key

Recipient:

- identifier

_**Remember: it's not a requirement to have everything ready! Your choices matter more than
a finished product!**_

## Solution

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
