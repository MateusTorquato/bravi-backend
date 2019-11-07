
Lumen is a micro-framework from Laravel creator, and consists of a smaller, faster and leaner version of a full web application framework. 

## Prerequisites

* PHP >= 7.3
* [Composer](https://getcomposer.org/download/ "Composer")
* PostgreSQL, MySQL or some relational database
* Install lumen:
> composer global require "laravel/lumen-installer"

## Instructions to run the app

* Clone the repository
> git clone https://github.com/MateusTorquato/bravi-backend.git

* Create a .env based on .env.exemple
> cp .env.example .env

* Install the dependencies
> composer install

* Create a new database named *bravi* and configure .env. The database used in this exemple is MySQL.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bravi
DB_USERNAME=root
DB_PASSWORD=
```
* Run the migrate command to setup the database and tabled
> php artisan migrate

* To run the application, use
> php -S localhost:8000 -t public


## API Documentation

You can check the API documentation at [apiary](https://bravitest.docs.apiary.io/), or test it directly using the the app hosted at [heroku](https://bravi-backend.herokuapp.com) using the routes documented at apiary
