![Package Logo](https://banners.beyondco.de/Laravel%20Helpers.png?theme=dark&packageManager=composer+require&packageName=rappasoft%2Flaravel-helpers&pattern=architect&style=style_1&description=For+Non-Laravel+Projects&md=1&showWatermark=0&fontSize=100px&images=hand)

## Laravel Helpers for Non-Laravel Projects

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rappasoft/laravel-helpers.svg?style=flat-square)](https://packagist.org/packages/rappasoft/laravel-helpers)
[![Total Downloads](https://img.shields.io/packagist/dt/rappasoft/laravel-helpers.svg?style=flat-square)](https://packagist.org/packages/rappasoft/laravel-helpers)
[![Tests](https://github.com/rappasoft/laravel-helpers/workflows/Tests/badge.svg)](https://github.com/rappasoft/laravel-helpers/actions)
[![PHP Version](https://img.shields.io/packagist/php-v/rappasoft/laravel-helpers.svg?style=flat-square)](https://packagist.org/packages/rappasoft/laravel-helpers)

This project takes the useful [Laravel helper functions](https://laravel.com/docs/helpers) and allows you to use them in Non-Laravel projects. Updated for compatibility with Laravel 10, 11, and 12.

### Enjoying this package? [Buy me a beer 🍺](https://www.buymeacoffee.com/rappasoft)

## Requirements

- PHP 8.1 or higher
- Composer

## Installation

```bash
composer require rappasoft/laravel-helpers
```

## Quick Start

Once installed, all helper functions are automatically available:

```php
<?php

require 'vendor/autoload.php';

// String helpers
$slug = str_slug('Hello World'); // "hello-world"
$plural = str_plural('user', 2); // "users"
$masked = str_mask('1234567890', '*', 3, 4); // "123****890"

// Array helpers
$value = array_get($data, 'user.profile.name', 'Default');
$hasKey = array_has($data, 'user.email');
$first = array_key_first($array);

// General helpers
if (blank($value)) {
    // Handle empty value
}

$result = transform($value, function ($v) {
    return strtoupper($v);
}, 'default');
```

## Documentation and Usage Instructions

See the [documentation](https://rappasoft.com/docs/laravel-helpers) for detailed installation and usage instructions.

## Testing

This package includes comprehensive tests using PHPUnit. To run the tests:

```bash
# Install dependencies
composer install

# Run all tests
vendor/bin/phpunit

# Run specific test suite
vendor/bin/phpunit tests/HelpersTest.php
vendor/bin/phpunit tests/StringsTest.php
vendor/bin/phpunit tests/ArraysTest.php
```

See [tests/README.md](tests/README.md) for more testing information.

## License

Since the Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT), this project is licensed under the same license.
