# Weather App

A simple weather application utilizing WeatherBit API.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

It is easiest to run this application from a Laravel Homestead vagrant box. Alternatively if you have the following, you can setup the application and complete the last optional set. 

```
PHP
Composer
Yarn (or Npm)
```

### Installing

A step by step series of examples that tell you how to get a development env running

Install Homestead

```
composer install
```

Create a copy of .env.example named .env

```
cp .env.example .env
```

Generate an application key

```
php artisan key:generate
```

Sign up for WeatherBit API and put key into .env as the WEATHERBIT_API_KEY

[WeatherBit](https://www.weatherbit.io/account/create)

Install Laravel dependencies

```
composer install
```

Install JS packages

```
yarn install (or npm install)
```

Build React

```
yarn run prod (or npm run prod)
```

(Optional) Serve the PHP application

```
php artisan serve
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

Tests are yet to be implemented.

## Usage

A browser can be used to view an interactive form for checking the weather.

Or the following command can be run to display a tabulated report for a list of cities.

```
php artisan forecast:report 'brisbane, gold coast, sunshine coast'
```

## Design Decisions

Communication between React components via props, I decided against observer/flux patterns, as they added unnecessary overhead for a simple component interactions.

Implemented repository pattern to allow for IoC, this facilitates maintainable code by offloading API interactions into it's own class.

Choose to write unit tests post development rather than TDD (this was so that I could deliver the project on time), unfortunately this lead to no unit testing being completed.

## Assumptions

Cities in the drop down were static and would never be updated.

URL did not need to be index-able with a query parameter for the form.

## Authors

* **Oliver Giess**

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
