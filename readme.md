## IOT Dashboard App/API

[Work in progress]

Central location to manage and log data from IOT devices. 

To run locally with docker-compose:
- Clone this repository
- Copy the .env.example file to .env
- Fill in the .env file (namely the database fields)
- Run `docker-compose -f docker-compose.yml -f docker-compose.dev.yml up -d`
- Run Composer to install dependencies `docker-compose exec web-base composer install`
- Run bootstrap script to install db `docker-compose exec web-base "bootstrap.sh"`
