#!/usr/bin/env bash

java -jar -Dwebdriver.chrome.driver="/usr/local/share/chromedriver" /usr/local/share/selenium/selenium-server-standalone-3.7.1.jar >/dev/null 2>&1 &
