#!/usr/bin/env bash

printf "Starting sync of vendor_internal directory.\n\n"

cd vendor_internal || exit

printf "Cloning lapse library...\n"

git clone https://github.com/datacenter-automation/lapse.git

printf "Cloning laravel-scout-mysql-driver library...\n"

git clone https://github.com/comdexxsolutionsllc/laravel-scout-mysql-driver.git

printf "Updating lapse library...\n"

cd  lapse || exit

composer update


printf "Done updating vendor_internal directory.\n\n"
