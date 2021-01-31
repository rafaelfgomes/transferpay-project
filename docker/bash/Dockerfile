FROM bash:latest

WORKDIR /app

RUN apk --update add curl

RUN rm -rf /var/cache/apk/*

COPY . .

CMD [ "bash", "init.sh" ]