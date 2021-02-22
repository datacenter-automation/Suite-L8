#!/usr/bin/env bash

# bin/install
# Install the application

command_exists() {
    command -v "$@" > /dev/null 2>&1
}

if ! command_exists fnm; then
    echo "fnm is not installed"
    echo "Visit https://github.com/Schniz/fnm to install"
    exit
fi

if ! command_exists composer; then
    echo "composer is not installed"
    echo "Visit https://getcomposer.org/download/ to install"
    exit
fi

if ! command_exists yarn; then
    echo "yarn is not installed"
    echo "Visit https://yarnpkg.com/lang/en/docs/install/ to install"
    exit
fi

echo "Removing existing ./node_modules folder"
rm -rf ./node_modules
echo "Removing existing ./vendor folder"
rm -rf ./vendor

fnm use
composer install
yarn install

cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
