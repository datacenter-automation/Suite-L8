name: Laravel

on:
  push:
    branches: [ main ]
  pull_request:
    branches: [ main ]

jobs:
  laravel:
    runs-on: ubuntu-latest
    steps:
    - uses: actions/checkout@v2
    - name: Copy .env
      run: php -r "file_exists('.env') || copy('.env.example', '.env');"
    - name: Install Dependencies
      run: composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist
    - name: Generate key
      run: php artisan key:generate
    - name: Directory Permissions
      run: chmod -R 777 storage bootstrap/cache
    - name: Create Database
      run: |
        mkdir -p database
        touch database/database.sqlite
    - name: Execute tests (Unit and Feature tests) via PHPUnit
      env:
        DB_CONNECTION: sqlite
        DB_DATABASE: database/database.sqlite
      run: vendor/bin/phpunit --testdox
    - name: PHP Security Checker
      uses: StephaneBour/actions-php-security-checker@1.0
      with:
          composer-lock: './composer-lock'
    - name: PHP Copy Paste Detector
      uses: StephaneBour/actions-php-cpd@1.0
      with:
          dir: './app'
  composer-normalize:
    runs-on: ubuntu-latest
    steps:
    - name: "Run composer normalize"
      uses: "docker://ergebnis/composer-normalize-action:latest"
