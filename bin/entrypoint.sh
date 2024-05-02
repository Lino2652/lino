#! /usr/bin/env sh


curl 'https://github.com/pressly/goose/releases/download/v3.20.0/goose_linux_x86_64' -o goose
chmod +x ./goose

# migrate -source ./migrations -database $DATABASE_URL up
./goose -dir ./migrations postgres $DATABASE_URL up

# php -S "0.0.0.0:8080"
