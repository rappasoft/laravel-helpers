---
title: Installation
weight: 4
---

## Requirements

- PHP 8.1 or higher
- Composer

## Installation

You can install the package via composer:

```bash
composer require rappasoft/laravel-helpers
```

## Version Compatibility

- **Version 3.0+**: PHP 8.1+, Laravel 10/11/12 compatible
- **Version 2.x**: PHP 7.3-8.0, Laravel 8 compatible

## After Installation

Once installed, all helper functions are automatically available in your project. No additional configuration is required!

```php
<?php

require 'vendor/autoload.php';

// All helpers are now available!
$slug = str_slug('Hello World'); // "hello-world"
$array = array_get($data, 'user.name');
$isEmpty = blank($value);
```
