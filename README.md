# MPLS

## Development Setup

Requirements:

- Docker ([Install Docker](https://docs.docker.com/get-docker/))
- Docker Compose ([Install Docker Compose](https://docs.docker.com/compose/install/))

In the terminal, go to directory you cloned this repo in. Spin up the containers for the web server by running the following command:

```bash
docker-composer up -d
```

Then run the migrations as listed in the Migrations section of this readme.

You should now be all set up with a development environment and database.

## New to Docker

If you haven't used docker before:

Before running `docker-compose up -d` for the _first time_, you need to run the following commands:

```bash
docker-compose run --rm -v $HOME/.cache/composer/:tmp -e COMPOSER_HOME=/tmp php composer install
docker-compose run --rm node npm install
```

If you run into any issues with the first command check out this resource:
[Docker hub - Composer](https://hub.docker.com/_/composer?tab=description)

## Migrations

```bash
 docker-compose exec php bash
```

Then run `php artisan migrate` in container

## Frontend

The Vue frontend is set up to detect changes with `npm run watch` in the node service, so when you make any frontend updates in the Vue files, go to your **localhost** in the browser to refresh the page and see your changes applied.

## Database Schema

Magics Table

```
{
  "id": integer,
  "first_name": string,
  "last_name": string,
  "email": string,
  "address_street1": string,
  "address_street2": string,
  "address_city": string,
  "address_state": string,
  "address_zip": string,
  "phone": string,
  "payment_credit_card_number": string,
  "payment_credit_card_expiration": string,
  "quantity": integer,
  "total": string,
  "order_date": date,
  "fulfilled": boolean,
  "created_at": date,
  "updated_at": date
}
```

## API

```bash
 docker-compose exec php bash
```

Once you're in the docker conatiner run `php artisan route:list` to see a list of routes (CRUD) for `api/magic`.

## TODO

- Create unit tests for each route
- Update CSS style based on feedback
- Input field masking
- Fix Credit Card expiration field to only accept month and year
- Don't put product page behidn auth?
- Add backend validation of request
- Deploy docker images to heroku via circleci
- Some form fields should only accept numbers and not letters
- ~~Add logic to MagicController for checking that customer has not exceeded 3 orders prior to adding to the database.~~
- Add API authentication using Laravel Passport
