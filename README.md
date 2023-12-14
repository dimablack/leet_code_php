# Leet Code on PHP

### Services:

- php (PHP 8.3 with PHP-FPM)
- web (Nginx)

## Requirements

- **Docker:** Ensure you have a stable version of [Docker](https://docs.docker.com/engine/install/) installed.
- **Docker Compose:** Make sure you have a compatible version of [Docker Compose](https://docs.docker.com/compose/install/#install-compose).

## How To Deploy

___
___
### Initial Setup

### For the first time only:

```bash
cp .env.example .env
```

```bash
docker-compose up -d
```
---
    docker exec -it leet_code_php_container bash
    composer install
or
```bash
docker exec leet_code_php_container bash -c 'composer install'
```
___
Visit: http://127.0.0.1:7070
___
___
### From the Second Time Onwards:
```bash
docker-compose up -d
docker exec -it leet_code_php_container bash
```
___
___
### Rebuild Docker images:
```bash
docker-compose build
```
#### *without cache
```bash
docker-compose build --no-cache
```
___
___
### Install additional packages:
```bash
docker exec leet_code_php_container bash -c 'composer require --dev phpunit/phpunit'
```
___
___

### Stop Docker containers
```bash
docker-compose stop
```

#### Stop and remove Docker containers, networks, and volumes created by

```bash
docker-compose down
```
___
___

## Open an Interactive Shell (Bash) Inside a Running Docker Container

### php
```bash
docker-compose exec -it leet_code_php_container bash
```
