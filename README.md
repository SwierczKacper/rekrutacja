### Requirements

- PHP >= 8.2

### Installation

1. composer install (if you d[.gitignore](.gitignore)on't have composer, install it from https://getcomposer.org/)
2. npm install (if you don't have npm, install it from https://nodejs.org/en/)
3. Copy .env.example to .env file[.gitignore](.gitignore)
4. Generate key `php artisan key:generate` to generate application key
5. Set all necessary variables in .env file (database, mail, etc.)
6. Run `php artisan migrate:fresh --seed` to create database tables and seed it with default data
7. Run `php artisan storage:link` to create symbolic link to storage directory
8. Run `npm run build` to compile assets

### Laradock configuration

1. Run `git submodule add -f https://github.com/Laradock/laradock.git` to add Laradock submodule.
2. Copy `.laradock` contents to `laradock` directory with overwriting files.
3. Copy `.env.example` to `.env` inside `laradock` directory.
4. Set `PHP_VERSION=8.2` in `.env` file.
5. Set `PHP_WORKER_INSTALL_REDIS=true` in `.env` file.
6. Set `PHP_WORKER_INSTALL_GD=true` in `.env` file.
7. Set `PHP_FPM_INSTALL_EXIF=true` in `.env` file.
8. Set `PHP_WORKER_INSTALL_ZIP_ARCHIVE=true` in `.env` file.
9. If you are on windows set ```DOCKER_SYNC_STRATEGY=unison``` in `.env` file.
10. Set ```COMPOSE_PROJECT_NAME=rekrutacja``` in `.env` file.
11. Set ```DATA_PATH_HOST=~/.laradock/rekrutacja``` in `.env` file.
12. Run `sh start.sh` to start docker containers.

### Accessing redis web ui

Default redis web ui url is `domain.test:9987`. Default redis web ui credentials are:

- username: `laradock`
- password: `laradock`
