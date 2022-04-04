# FDJ

This project has been made to visualize the latest drawns of Euromillions.

It has been made with :

 * PHP 8
 * Symfony 6
 * Twig 
 * font-awesome

## How to start
### Requirements

In order to work with this project, you will need to have `docker` and `docker-compose` installed.

### Installation

 * git clone
 * in the `docker-compose.yml` file : 
   * modify args `GIT_USERNAME` and `GIT_EMAIL` in `docker-compose.yml` file according to your git account

*Optional*

You can modify the ports of the container to better suit your already opened ports. By default, the ports used in the hosts are `8888` for the web server and `9001` for php fpm. To edit them, go to the `docker-compose.yml` file and look for the `ports` values.

 * `docker-composer up -d --build`
 * `docker-compose exec fdj-php composer install`


## How to use

To access to the webpage, you need to start the webserver : 

`docker-compose exec fdj-php symfony serve`

Then, the page is accessible at the url : `127.0.0.1:8888`.

## How to test

The tests are located in the `tests` folder.

In order to launch the tests, use the command : 

`docker-compose exec fdj-php php bin/phpunit`

