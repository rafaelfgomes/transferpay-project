#!/bin/bash

if [ -f .env ]; then

  rm .env

fi

cp .env.sample .env

#folderName=$(basename $(pwd))
prefixContainerName=transferpay

apiContainerName=$prefixContainerName"_api"
mariadbContainerName=$prefixContainerName"_db"
nginxContainerName=$prefixContainerName"_nginx"

##Change these variables if you need##
nginxHttpPort=9292
nginxHttpsPort=4848
dbPort=33066

dbName=transferpay-db
dbUsername=root
dbPassword=p@ssw0rd

apiName=TransferPay
apiUrl=0.0.0.0
######################################

appTz=$(curl http://ip-api.com/line?fields=timezone)
apiKey=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 64 | head -n 1)

sed -i "s+API_CONTAINER_NAME=+API_CONTAINER_NAME=$apiContainerName+g" .env
sed -i "s+MARIADB_CONTAINER_NAME=+MARIADB_CONTAINER_NAME=$mariadbContainerName+g" .env
sed -i "s+NGINX_CONTAINER_NAME=+NGINX_CONTAINER_NAME=$nginxContainerName+g" .env

sed -i "s+API_HTTP_PORT=+API_HTTP_PORT=$nginxHttpPort+g" .env
sed -i "s+API_HTTPS_PORT=+API_HTTPS_PORT=$nginxHttpsPort+g" .env
sed -i "s+DB_PORT=+DB_PORT=$dbPort+g" .env

sed -i "s+DB_NAME=+DB_NAME=$dbName+g" .env
sed -i "s+DB_USER=+DB_USER=$dbUsername+g" .env
sed -i "s+DB_PASSWD=+DB_PASSWD=$dbPassword+g" .env

sed -i "s+TIMEZONE=+TIMEZONE=$appTz+g" .env

sed -i "s+API_KEY=+API_KEY=$apiKey+g" .env
sed -i "s+API_NAME=+API_NAME=$apiName+g" .env
sed -i "s+API_URL=+API_URL=$apiUrl+g" .env

chmod 766 .env
