#!/bin/sh

while true
do
    php artisan app:delete-read-notifications
    echo command ran successfully
    sleep 10
done