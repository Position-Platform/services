# Position Services

New Services Laravel for project Position

## Installation

```sh
$ git clone https://github.com/Position-Platform/services.git
$ cd services
```

```
$ composer install
$ cp .env.example .env
```

-   edit & add DB & Email infos in .env

```
DB_DATABASE=database name
DB_USERNAME=database username
DB_PASSWORD=database password

MAIL_MAILER=smtp
MAIL_HOST=your host
MAIL_PORT=your port
MAIL_USERNAME=your username
MAIL_PASSWORD=your password
MAIL_ENCRYPTION=TLS
MAIL_FROM_ADDRESS=infos@position.cm
MAIL_FROM_NAME=Position

SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=meilisearch host
MEILISEARCH_KEY=meilisearch apikey

NEXAH_USERNAME=nexah username
NEXAH_PASSWORD=nexah password
```

```
$ php artisan key:generate
$ php artisan migrate
$ php artisan passport:install
$ php artisan db:seed
$ php artisan apikey:generate app1
$ php artisan storage:link
$ php artisan scout:import "App\Models\SousCategorie"
$ exit
```
