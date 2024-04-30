FROM php:8.3-alpine

COPY . .

CMD ./bin/entrypoint.sh
