#!/usr/bin/env bash

echo "Install Supervisor if it doesn't exist."
sudo apt install -y supervisor

echo "Re-read supervisor configuration."
sudo supervisorctl reread

echo "Update supervisor configuration."
sudo supervisorctl update

echo "Status of supervisor configuration."
sudo supervisorctl status > supervisor-status.log
