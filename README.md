# PHP Test (Language Group)

Here is the PHP application that will list all the countries which speaks the same language or
checks if given two countries speak the same language by using open rest api:

https://restcountries.eu/

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Web server with PHP 7.0+

Composer


### Installing

Clone git repository to working directory

```
git pull https://github.com/bohdanmedv/PHP-Test-Language-Group-.git
```

Navigate to project directory and run

```
composer up
```

Now you can use the application

```
php index.php Russia
```

And get output like: 

```
Country language code: ru
Russian Federation speaks same language with these countries: Antarctica, Armeni
a, Belarus, Kazakhstan, Kyrgyzstan, Tajikistan, Turkmenistan, Uzbekistan.
```

Fore compare countries use

```
$ php index.php France Canada

France and Canada speak the same language.
```
## Running the tests

For tests use a command 
```
vendor/bin/phpunit tests
```

Output be like:
```
PHPUnit 5.7.27 by Sebastian Bergmann and contributors.

.....................                                             21 / 21 (100%)

Time: 7.91 seconds, Memory: 4.00MB

OK (21 tests, 21 assertions)
```

## Authors

* **Bohdan Medvediev** 
