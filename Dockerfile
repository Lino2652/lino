FROM php:8.3-alpine

COPY . .

ENTRYPOINT ["./bin/entrypoint.sh"]
