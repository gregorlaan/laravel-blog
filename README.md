# Setup

## Install PHP 7.4

    sudo apt-get install software-properties-common
    sudo add-apt-repository ppa:ondrej/php
    sudo apt-get update
    sudo apt-get install -y php7.4

## Install PHP 7.4 modules

    sudo apt install php7.4-common php7.4-zip php7.4-bcmath openssl php7.4-json php7.4-mbstring php7.4-xml php7.4-sqlite3

## Download and install Composer

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"

## Make Composer available globally

    sudo mv composer.phar /usr/local/bin/composer

## Install NodeJS and NPM

    sudo apt-get install nodejs
    sudo apt-get install npm

## Install Laravel globally

    composer global require laravel/installer

## Add Composer to path directory

    export PATH="~/.config/composer/vendor/bin:$PATH"
    source ~/.bashrc

## Create a new Laravel project

    laravel new laravel-blog

## Install Curl

    sudo apt-get install -y curl

##  Create the ENV (.env) File with the following contents

    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost
    DB_CONNECTION=sqlite

## Create a database file inside project database directory

    touch database/database.sqlite

## Generate application key

    php artisan key:generate

# Common commands

Install and compile assets:

    npm install && npm run dev

Run built-in webserver:

    php artisan serve

Run database migrations:

    php artisan migrate

Run new database migrations:

    php artisan migrate:fresh

Clear route cache:

    php artisan route:cache

Automatically compile CSS and JS files:

    npm run watch

Clear compiled views cache:

    php artisan view:clear

Clear app cache:

    php artisan cache:clear

Clear config cache:

    php artisan config:cache

# Tinker commands

Open Tinker:

    php artisan tinker

Display all users:

    User::all();

Create a profile:

    $profile = new \App\Profile();
    $profile->title = 'This is the title';
    $profile->description = 'This is the desc';
    $profile->user_id = ;
    $profile->save();

Find a user:

    $user = App\User::find(1);

# Development

## Run built-in webserver

    php artisan serve

## Install Laravel UI package

    composer require laravel/ui

## Enable authentication

    php artisan ui vue --auth

## Install and compile assets

    npm install && npm run dev

## Create database file

    touch database/database.sqlite

## Install Sqlite

    sudo apt-get install php7.4-sqlite

## Run database migrations

    php artisan migrate

## Drop all tables and re-run all migrations

    php artisan migrate:fresh

## Create profile controller

    php artisan make:controller ProfileController

## Create user profile model with database migration

    php artisan make:model Profile -m

## Create user post model with database migration

    php artisan make:model Post -m

## Create post controller
    
    php artisan make:controller PostController

## Create a symbolic link from "public/storage" to "storage/app/public"

    php artisan storage:link

## Install GD Graphics Library

    sudo apt-get install php7.4-gd

## Install PHP image handling and manipulation library

    composer require intervention/image

## Create ProfilePolicy for profile model

    php artisan make:policy ProfilePolicy -m Profile

## Create follow controller

    php artisan make:controller FollowController

## Create a pivot table for storing followers

    php artisan make:migration creates_profile_user_pivot_table --create profile_user

## Install Laravel Telescope package

> Installation may have lots of bug with the latest laravel version

    composer require laravel/telescope

## Install all of the Telescope resources

    php artisan telescope:
    
## Run new Telescope database migrations

    php artisan migrate

## Install vue2-editor based on Quill

    npm install vue2-editor