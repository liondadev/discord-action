#!/bin/sh

export WEBHOOK_URL=$1
export WEBHOOK_MESSAGE=$2

php /usr/src/app/script.php
