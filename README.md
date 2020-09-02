# Adzooma RSS feed 
Adzooma RSS feed is a test project written on Laravel 7.
### Tech

* Laravel 7
* Twitter Bootstrap 4.13

### Reqruirements

* PHP >= 7.2


### Installation

```sh
git clone https://github.com/adriantamasdevel/rss-feed
cd rss-feed
```
Rename ```app/.env.example``` to ```app/.env``` and fill your configuration settings.

#### Installing docker containers (mysql, nginx and app):
```sh
docker-compose build --no-cache --pull
docker-compose up -d
```

#### Install composer modules:
```sh
docker-compose exec app composer install
```

#### Generate artisan key:
```sh
docker-compose exec app php artisan key:generate
```
### Testing project:

```sh
docker-compose exec app ./vendor/bin/phpunit
```

Default testing configuration is set to mysql homestead. Configuration can be found: ```phpunit.xml```

### Running project:

Go to: http://127.0.0.1:8080
