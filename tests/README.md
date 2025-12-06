# Testing Laravel Helpers

This directory contains comprehensive tests for all Laravel helper functions.

## Running Tests

### Install Dependencies

First, install PHPUnit and other dependencies:

```bash
composer install
```

### Run All Tests

```bash
vendor/bin/phpunit
```

### Run Specific Test Suite

```bash
# Test helpers
vendor/bin/phpunit tests/HelpersTest.php

# Test strings
vendor/bin/phpunit tests/StringsTest.php

# Test arrays
vendor/bin/phpunit tests/ArraysTest.php

# Test classes
vendor/bin/phpunit tests/ClassesTest.php
```

### Run with Coverage

```bash
vendor/bin/phpunit --coverage-text
```

## Test Structure

- `HelpersTest.php` - Tests for general helper functions (dd, dump, e, value, tap, etc.)
- `StringsTest.php` - Tests for all string helper functions
- `ArraysTest.php` - Tests for all array helper functions
- `ClassesTest.php` - Tests for class-related helper functions

## Writing New Tests

When adding new helper functions, make sure to add corresponding tests in the appropriate test file. Follow the existing test patterns and ensure good coverage.

