## Prerequisites

* [Docker](https://www.docker.com/ "Docker")
* [Docker-compose](https://docs.docker.com/compose/install/ "Docker-compose")
* [Make (optional)](http://www.mingw.org/ "Make")

If you chose not install make, insted of running the make command, you must run the commands inside Makefile

## Instructions to run the app

* Setup the project
> make setup

## Instructions to run the app - without make

Download all the images and build the app and containers

```
docker-compose pull
docker-compose build
```

Create a .env file based on .env.exemple
```
cp .env.example .env
```

Seed the database
```
docker-compose up -d app
docker-compose run --rm app composer install
docker-compose run --rm app php artisan migrate
```

Start the all containers
```
docker-compose up -d
```

## Accessing the app
To access the app, simply use the localhost using port 80. Ex:
> http://localhost/people

## Accessing the database
To access the database, you can use localhost using port 8080. Database info can be found in docker-compose.yml file.
> http://localhost:8080

## API Documentation

You can check the API documentation at [apiary](https://bravitest.docs.apiary.io/), or test it directly using the the app hosted at [heroku](https://bravi-backend.herokuapp.com) using the routes documented at apiary
