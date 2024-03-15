FROM php:8.2
WORKDIR /usr/src/app
COPY ./src .

ENTRYPOINT [ "./entrypoint.sh" ]
