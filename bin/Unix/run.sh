#!/usr/bin/env bash

# bin/run
# Run the local development environment

if [[ "$OSTYPE" == "linux"* ]]; then
    sudo service mysql start
fi

php -S 0.0.0.0:8000 -t public/ & yarn run watch
