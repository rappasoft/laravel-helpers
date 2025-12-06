---
title: Usage
weight: 5
---

All helper functions are automatically available after installation. No configuration required!

## Quick Examples

```php
<?php

require 'vendor/autoload.php';

// String manipulation
$slug = str_slug('Hello World'); // "hello-world"
$plural = str_plural('user', 2); // "users"
$masked = str_mask('1234567890', '*', 3, 4); // "123****890"

// Array operations
$value = array_get($data, 'user.profile.name', 'Default');
$hasKey = array_has($data, 'user.email');
$first = array_key_first($array);

// General utilities
if (blank($value)) {
    // Handle empty value
}

$result = transform($value, function ($v) {
    return strtoupper($v);
}, 'default');
```

## Arrays

### array_accessible

```php
/**
 * Determine whether the given value is array accessible.
 *
 * @param  mixed  $value
 *
 * @return bool
 */
function array_accessible($value): bool
```

### array_add

```php
/**
 * Add an element to an array using "dot" notation if it doesn't exist.
 *
 * @param  array  $array
 * @param  string  $key
 * @param  mixed  $value
 *
 * @return array
 */
function array_add(array $array, string $key, $value): array
```

### array_collapse

```php
/**
 * Collapse an array of arrays into a single array.
 *
 * @param  iterable  $array
 *
 * @return array
 */
function array_collapse(iterable $array): array
```

### array_cross_join

```php
/**
 * Cross join the given arrays, returning all possible permutations.
 *
 * @param  iterable  ...$arrays
 *
 * @return array
 */
function array_cross_join(...$arrays): array
```

### array_divide

```php
/**
 * Divide an array into two arrays. One with keys and the other with values.
 *
 * @param  array  $array
 *
 * @return array
 */
function array_divide(array $array): array
```

### array_dot

```php
/**
 * Flatten a multi-dimensional associative array with dots.
 *
 * @param  iterable  $array
 * @param  string  $prepend
 *
 * @return array
 */
function array_dot(iterable $array, string $prepend = ''): array
```

### array_except

```php
/**
 * Get all of the given array except for a specified array of keys.
 *
 * @param  array  $array
 * @param  array|string  $keys
 *
 * @return array
 */
function array_except(array $array, $keys): array
```

### array_exists

```php
/**
 * Determine if the given key exists in the provided array.
 *
 * @param  \ArrayAccess|array  $array
 * @param  string|int  $key
 *
 * @return bool
 */
function array_exists($array, $key): bool
```

### array_first

```php
/**
 * Return the first element in an array passing a given truth test.
 *
 * @param  iterable  $array
 * @param  callable|null  $callback
 * @param  mixed  $default
 *
 * @return mixed
 */
function array_first(iterable $array, callable $callback = null, $default = null)
```

### array_last

```php
/**
 * Return the last element in an array passing a given truth test.
 *
 * @param  array  $array
 * @param  callable|null  $callback
 * @param  mixed  $default
 *
 * @return mixed
 */
function array_last(array $array, callable $callback = null, $default = null)
```

### array_flatten

```php
/**
 * Flatten a multi-dimensional array into a single level.
 *
 * @param  iterable  $array
 * @param  int|float  $depth
 *
 * @return array
 */
function array_flatten(iterable $array, int|float $depth = INF): array
```

### array_forget

```php
/**
 * Remove one or many array items from a given array using "dot" notation.
 *
 * @param  array  $array
 * @param  array|string  $keys
 *
 * @return void
 */
function array_forget(array &$array, $keys)
```

### array_get

```php
/**
 * Get an item from an array using "dot" notation.
 *
 * @param  \ArrayAccess|array  $array
 * @param  string|int|null  $key
 * @param  mixed  $default
 *
 * @return mixed
 */
function array_get($array, $key, $default = null)
```

### array_has

```php
/**
 * Check if an item or items exist in an array using "dot" notation.
 *
 * @param  \ArrayAccess|array  $array
 * @param  string|array  $keys
 *
 * @return bool
 */
function array_has($array, $keys): bool
```

### array_has_any

```php
 /**
 * Determine if any of the keys exist in an array using "dot" notation.
 *
 * @param  \ArrayAccess|array  $array
 * @param  string|array  $keys
 *
 * @return bool
 */
function array_has_any($array, $keys): bool
```

### array_is_assoc

```php
/**
 * Determines if an array is associative.
 *
 * An array is "associative" if it doesn't have sequential numerical keys beginning with zero.
 *
 * @param  array  $array
 *
 * @return bool
 */
function array_is_assoc(array $array): bool
```

### array_only

```php
/**
 * Get a subset of the items from the given array.
 *
 * @param  array  $array
 * @param  array|string  $keys
 *
 * @return array
 */
function array_only(array $array, $keys): array
```

### array_pluck

```php
/**
 * Pluck an array of values from an array.
 *
 * @param  iterable  $array
 * @param  string|array|int|null  $value
 * @param  string|array|null  $key
 *
 * @return array
 */
function array_pluck(iterable $array, $value, $key = null): array
```

### array_prepend

```php
/**
 * Push an item onto the beginning of an array.
 *
 * @param  array  $array
 * @param  mixed  $value
 * @param  mixed  $key
 *
 * @return array
 */
function array_prepend(array $array, $value, $key = null): array
```

### array_pull

```php
/**
 * Get a value from the array, and remove it.
 *
 * @param  array  $array
 * @param  string  $key
 * @param  mixed  $default
 *
 * @return mixed
 */
function array_pull(array &$array, string $key, $default = null)
```

### array_query

```php
/**
 * Convert the array into a query string.
 *
 * @param  array  $array
 *
 * @return string
 */
function array_query(array $array): string
```

### array_random

```php
/**
 * Get one or a specified number of random values from an array.
 *
 * @param  array  $array
 * @param  int|null  $number
 * @param  bool  $preserveKeys
 *
 * @return mixed
 *
 * @throws \InvalidArgumentException
 */
function array_random(array $array, ?int $number = null, bool $preserveKeys = false)
```

### array_set

```php
/**
 * Set an array item to a given value using "dot" notation.
 *
 * If no key is given to the method, the entire array will be replaced.
 *
 * @param  array  $array
 * @param  string|null  $key
 * @param  mixed  $value
 *
 * @return array
 */
function array_set(array &$array, ?string $key, $value): array
```

### array_shuffle

```php
/**
 * Shuffle the given array and return the result.
 *
 * @param  array  $array
 * @param  int|null  $seed
 *
 * @return array
 */
function array_shuffle(array $array, ?int $seed = null): array
```

### array_sort_recursive

```php
/**
 * Recursively sort an array by keys and values.
 *
 * @param  array  $array
 * @param  int  $options
 * @param  bool  $descending
 *
 * @return array
 */
function array_sort_recursive(array $array, int $options = SORT_REGULAR, bool $descending): array
```

### array_to_css_classes

```php
/**
 * Conditionally compile classes from an array into a CSS class list.
 *
 * @param  array  $array
 *
 * @return string
 */
function array_to_css_classes(array $array): string
```

### array_where

```php
/**
 * Filter the array using the given callback.
 *
 * @param  array  $array
 * @param  callable  $callback
 *
 * @return array
 */
function array_where(array $array, callable $callback): array
```

### array_wrap

```php
/**
 * If the given value is not an array and not null, wrap it in one.
 *
 * @param  mixed  $value
 *
 * @return array
 */
function array_wrap($value): array
```

### data_fill

```php
/**
 * Fill in data where it's missing.
 *
 * @param  mixed  $target
 * @param  string|array  $key
 * @param  mixed  $value
 * @return mixed
 */
function data_fill(&$target, $key, $value)
```

### data_get

```php
/**
 * Get an item from an array or object using "dot" notation.
 *
 * @param  mixed  $target
 * @param  string|array|int|null  $key
 * @param  mixed  $default
 * @return mixed
 */
function data_get($target, $key, $default = null)
```

### data_set

```php
/**
 * Set an item on an array or object using dot notation.
 *
 * @param  mixed  $target
 * @param  string|array  $key
 * @param  mixed  $value
 * @param  bool  $overwrite
 *
 * @return mixed
 */
function data_set(&$target, $key, $value, bool $overwrite = true)
```

### head

```php
/**
 * Get the first element of an array. Useful for method chaining.
 *
 * @param  array  $array
 *
 * @return mixed
 */
function head(array $array)
```

### last

```php
/**
 * Get the last element from an array.
 *
 * @param  array  $array
 *
 * @return mixed
 */
function last(array $array)
```

### array_key_first

```php
/**
 * Get the first key of the given array without affecting the internal array pointer.
 *
 * @param  array  $array
 * @return int|string|null
 */
function array_key_first(array $array)
```

### array_key_last

```php
/**
 * Get the last key of the given array without affecting the internal array pointer.
 *
 * @param  array  $array
 * @return int|string|null
 */
function array_key_last(array $array)
```

### array_map_assoc

```php
/**
 * Run a map over each of the items in the array.
 *
 * @param  callable  $callback
 * @param  array  $array
 * @return array
 */
function array_map_assoc(callable $callback, array $array): array
```

### array_map_with_keys

```php
/**
 * Run a map over each of the items in the array.
 *
 * @param  callable  $callback
 * @param  array  $array
 * @return array
 */
function array_map_with_keys(callable $callback, array $array): array
```

### array_undot

```php
/**
 * Expand a dotted array into a full multi-dimensional array.
 *
 * @param  iterable  $array
 * @return array
 */
function array_undot(iterable $array): array
```

### array_value_first

```php
/**
 * Get the first value from an array.
 *
 * @param  array  $array
 * @param  mixed  $default
 * @return mixed
 */
function array_value_first(array $array, $default = null)
```

### array_value_last

```php
/**
 * Get the last value from an array.
 *
 * @param  array  $array
 * @param  mixed  $default
 * @return mixed
 */
function array_value_last(array $array, $default = null)
```

### to_array

```php
/**
 * Convert Json into Array.
 *
 * @param  string  $json
 *
 * @return array
 */
function to_array(string $json)
```

## Strings

### preg_replace_array

```php
/**
 * Replace a given pattern with each value in the array in sequentially.
 *
 * @param  string  $pattern
 * @param  array  $replacements
 * @param  string  $subject
 *
 * @return string
 */
function preg_replace_array(string $pattern, array $replacements, string $subject): string
```

### str_after

```php
/**
 * Return the remainder of a string after the first occurrence of a given value.
 *
 * @param  string  $subject
 * @param  string  $search
 *
 * @return string
 */
function str_after(string $subject, string $search): string
```

### str_after_last

```php
/**
 * Return the remainder of a string after the last occurrence of a given value.
 *
 * @param  string  $subject
 * @param  string  $search
 *
 * @return string
 */
function str_after_last(string $subject, string $search): string
```

### str_before

```php
/**
 * Get the portion of a string before the first occurrence of a given value.
 *
 * @param  string  $subject
 * @param  string  $search
 *
 * @return string
 */
function str_before(string $subject, string $search): string
```

### str_before_last

```php
/**
 * Get the portion of a string before the last occurrence of a given value.
 *
 * @param  string  $subject
 * @param  string  $search
 *
 * @return string
 */
function str_before_last(string $subject, string $search): string
```

### str_between

```php
/**
 * Get the portion of a string between two given values.
 *
 * @param  string  $subject
 * @param  string  $from
 * @param  string  $to
 *
 * @return string
 */
function str_between(string $subject, string $from, string $to): string
```

### str_contains

```php
 /**
 * Determine if a given string contains a given substring.
 *
 * @param  string  $haystack
 * @param  string|string[]  $needles
 *
 * @return bool
 */
function str_contains(string $haystack, $needles): bool
```

### str_contains_all

```php
/**
 * Determine if a given string contains all array values.
 *
 * @param  string  $haystack
 * @param  string[]  $needles
 *
 * @return bool
 */
function str_contains_all(string $haystack, array $needles): bool
```

### str_ends_with

```php
/**
 * Determine if a given string ends with a given substring.
 *
 * @param  string  $haystack
 * @param  string|string[]  $needles
 *
 * @return bool
 */
function str_ends_with(string $haystack, $needles): bool
```

### str_finish

```php
/**
 * Cap a string with a single instance of a given value.
 *
 * @param  string  $value
 * @param  string  $cap
 *
 * @return string
 */
function str_finish(string $value, string $cap): string
```

### str_is

```php
/**
 * Determine if a given string matches a given pattern.
 *
 * @param  string|array  $pattern
 * @param  string  $value
 *
 * @return bool
 */
function str_is($pattern, string $value): bool
```

### str_is_uuid

```php
/**
 * Determine if a given string is a valid UUID.
 *
 * @param  string  $value
 *
 * @return bool
 */
function str_is_uuid(string $value): bool
```

### str_kebab

```php
/**
 * Convert a string to kebab case.
 *
 * @param  string  $value
 *
 * @return string
 */
function str_kebab(string $value): string
```

### str_length

```php
/**
 * Return the length of the given string.
 *
 * @param  string  $value
 * @param  string|null  $encoding
 *
 * @return int
 */
function str_length(string $value, ?string $encoding = null): int
```

### str_limit

```php
/**
 * Limit the number of characters in a string.
 *
 * @param  string  $value
 * @param  int  $limit
 * @param  string  $end
 *
 * @return string
 */
function str_limit(string $value, int $limit = 100, string $end = '...'): string
```

### str_lower

```php
/**
 * Convert the given string to lower-case.
 *
 * @param  string  $value
 *
 * @return string
 */
function str_lower(string $value): string
```

### str_words

```php
/**
 * Limit the number of words in a string.
 *
 * @param  string  $value
 * @param  int  $words
 * @param  string  $end
 *
 * @return string
 */
function str_words(string $value, int $words = 100, string $end = '...'): string
```

### str_match

```php
/**
 * Get the string matching the given pattern.
 *
 * @param  string  $pattern
 * @param  string  $subject
 *
 * @return string
 */
function str_match(string $pattern, string $subject): string
```

### str_pad_both

```php
/**
 * Pad both sides of a string with another.
 *
 * @param  string  $value
 * @param  int  $length
 * @param  string  $pad
 *
 * @return string
 */
function str_pad_both(string $value, int $length, string $pad = ' '): string
```

### str_pad_left

```php
/**
 * Pad the left side of a string with another.
 *
 * @param  string  $value
 * @param  int  $length
 * @param  string  $pad
 *
 * @return string
 */
function str_pad_left(string $value, int $length, string $pad = ' '): string
```

### str_pad_right

```php
/**
 * Pad the right side of a string with another.
 *
 * @param  string  $value
 * @param  int  $length
 * @param  string  $pad
 *
 * @return string
 */
function str_pad_right(string $value, int $length, string $pad = ' '): string
```

### str_random

```php
/**
 * Generate a more truly "random" alpha-numeric string.
 *
 * @param  int  $length
 *
 * @return string
 */
function str_random(int $length = 16): string
```

### str_replace_array

```php
/**
 * Replace a given value in the string sequentially with an array.
 *
 * @param  string  $search
 * @param  array<int|string, string>  $replace
 * @param  string  $subject
 *
 * @return string
 */
function str_replace_array(string $search, array $replace, string $subject): string
```

### str_replace_first

```php
/**
 * Replace the first occurrence of a given value in the string.
 *
 * @param  string  $search
 * @param  string  $replace
 * @param  string  $subject
 *
 * @return string
 */
function str_replace_first(string $search, string $replace, string $subject): string
```

### str_replace_last

```php
/**
 * Replace the last occurrence of a given value in the string.
 *
 * @param  string  $search
 * @param  string  $replace
 * @param  string  $subject
 *
 * @return string
 */
function str_replace_last(string $search, string $replace, string $subject): string
```

### str_remove

```php
/**
 * Remove any occurrence of the given string in the subject.
 *
 * @param  string|array<string>  $search
 * @param  string  $subject
 * @param  bool  $caseSensitive
 *
 * @return string
 */
function str_remove($search, string $subject, bool $caseSensitive = true): string
```

### str_start

```php
/**
 * Begin a string with a single instance of a given value.
 *
 * @param  string  $value
 * @param  string  $prefix
 *
 * @return string
 */
function str_start(string $value, string $prefix): string
```

### str_upper

```php
/**
 * Convert the given string to upper-case.
 *
 * @param  string  $value
 *
 * @return string
 */
function str_upper(string $value): string
```

### str_title

```php
/**
 * Convert the given string to title case.
 *
 * @param  string  $value
 *
 * @return string
 */
function str_title(string $value): string
```

### str_snake

```php
/**
 * Convert a string to snake case.
 *
 * @param  string  $value
 * @param  string  $delimiter
 *
 * @return string
 */
function str_snake(string $value, string $delimiter = '_'): string
```

### str_starts_with

```php
/**
 * Determine if a given string starts with a given substring.
 *
 * @param  string  $haystack
 * @param  string|string[]  $needles
 *
 * @return bool
 */
function str_starts_with(string $haystack, $needles): bool
```

### str_studly

```php
/**
 * Convert a value to studly caps case.
 *
 * @param  string  $value
 *
 * @return string
 */
function str_studly(string $value): string
```

### str_pascal

```php
/**
 * Convert a string to pascal case.
 *
 * @param  string  $value
 *
 * @return string
 */
function str_pascal(string $value): string
```

### str_camel

```php
/**
 * Convert a string to cameel case.
 *
 * @param  string  $value
 *
 * @return string
 */
function str_camel(string $value): string
```

### str_uuid4

```php
/**
 * Generate a UUID (version 4).
 *
 * @return string
 */
function str_uuid4(): string
```

### str_ascii

```php
/**
 * Transliterate a UTF-8 value to ASCII.
 *
 * @param  string  $value
 * @param  string  $language
 * @return string
 */
function str_ascii(string $value, string $language = 'en'): string
```

### str_slug

```php
/**
 * Generate a URL friendly "slug" from a given string.
 *
 * @param  string  $title
 * @param  string  $separator
 * @param  string|null  $language
 * @return string
 */
function str_slug(string $title, string $separator = '-', ?string $language = 'en'): string
```

### str_plural

```php
/**
 * Get the plural form of an English word.
 *
 * @param  string  $value
 * @param  int|array|\Countable  $count
 * @return string
 */
function str_plural(string $value, $count = 2): string
```

### str_singular

```php
/**
 * Get the singular form of an English word.
 *
 * @param  string  $value
 * @return string
 */
function str_singular(string $value): string
```

### str_ucfirst

```php
/**
 * Make a string's first character uppercase.
 *
 * @param  string  $string
 * @return string
 */
function str_ucfirst(string $string): string
```

### str_lcfirst

```php
/**
 * Make a string's first character lowercase.
 *
 * @param  string  $string
 * @return string
 */
function str_lcfirst(string $string): string
```

### str_mask

```php
/**
 * Mask a portion of a string with a repeated character.
 *
 * @param  string  $string
 * @param  string  $character
 * @param  int  $index
 * @param  int|null  $length
 * @return string
 */
function str_mask(string $string, string $character, int $index, ?int $length = null): string
```

### str_contains_any

```php
/**
 * Determine if a given string contains any of the given substrings.
 *
 * @param  string  $haystack
 * @param  string[]  $needles
 * @return bool
 */
function str_contains_any(string $haystack, array $needles): bool
```

### str_excerpt

```php
/**
 * Extract an excerpt from text that matches the first instance of a phrase.
 *
 * @param  string  $text
 * @param  string  $phrase
 * @param  array  $options
 * @return string|null
 */
function str_excerpt(string $text, string $phrase = '', array $options = []): ?string
```

### str_headline

```php
/**
 * Convert the given string to title case for each word.
 *
 * @param  string  $value
 * @return string
 */
function str_headline(string $value): string
```

### str_is_ascii

```php
/**
 * Determine if a given string is 7 bit ASCII.
 *
 * @param  string  $value
 * @return bool
 */
function str_is_ascii(string $value): bool
```

### str_is_json

```php
/**
 * Determine if a given string is valid JSON.
 *
 * @param  string  $value
 * @return bool
 */
function str_is_json(string $value): bool
```

### str_password

```php
/**
 * Generate a more truly "random" alpha-numeric string.
 *
 * @param  int  $length
 * @return string
 */
function str_password(int $length = 32): string
```

### str_reverse

```php
/**
 * Reverse the given string.
 *
 * @param  string  $value
 * @return string
 */
function str_reverse(string $value): string
```

### str_squish

```php
/**
 * Remove all "extra" blank space from the given string.
 *
 * @param  string  $value
 * @return string
 */
function str_squish(string $value): string
```

### str_swap

```php
/**
 * Swap multiple values in a string with other values.
 *
 * @param  array  $map
 * @param  string  $subject
 * @return string
 */
function str_swap(array $map, string $subject): string
```

### str_wrap

```php
/**
 * Wrap a string to a given number of characters.
 *
 * @param  string  $value
 * @param  int  $width
 * @param  string  $break
 * @return string
 */
function str_wrap(string $value, int $width = 75, string $break = "\n"): string
```

### str_jwt

```php
/**
 * Generate a JWT.
 *
 * @param  array  $payload
 *
 * @return string
 */
function str_jwt(array $payload): string
```

## Classes

### class_basename

```php
/**
 * Get the class "basename" of the given object / class.
 *
 * @param  string|object  $class
 * @return string
 */
function class_basename($class): string
```

### class_uses_recursive

```php
/**
 * Returns all traits used by a class, its parent classes and trait of their traits.
 *
 * @param  object|string  $class
 * @return array
 */
function class_uses_recursive($class): array
```

### trait_uses_recursive

```php
/**
 * Returns all traits used by a trait and its traits.
 *
 * @param  string  $trait
 * @return array
 */
function trait_uses_recursive($trait): array
```

## General Helpers

### dd

```php
/**
 * Dump the passed variables and end the script.
 *
 * @param  mixed  ...$vars
 * @return never
 */
function dd(...$vars)
```

### dump

```php
/**
 * Dump the passed variables.
 *
 * @param  mixed  ...$vars
 * @return mixed
 */
function dump(...$vars)
```

### str

```php
/**
 * Get a string helper instance or return the string.
 *
 * @param  string|null  $string
 * @return string|object
 */
function str($string = null)
```

### blank

```php
/**
 * Determine if the given value is "blank".
 *
 * @param  mixed  $value
 * @return bool
 */
function blank($value)
```

### filled

```php
/**
 * Determine if a value is "filled".
 *
 * @param  mixed  $value
 * @return bool
 */
function filled($value)
```

### throw_if

```php
/**
 * Throw the given exception if the given condition is true.
 *
 * @param  mixed  $condition
 * @param  \Throwable|string  $exception
 * @param  array  ...$parameters
 * @return mixed
 *
 * @throws \Throwable
 */
function throw_if($condition, $exception, ...$parameters)
```

### throw_unless

```php
/**
 * Throw the given exception unless the given condition is true.
 *
 * @param  mixed  $condition
 * @param  \Throwable|string  $exception
 * @param  array  ...$parameters
 * @return mixed
 *
 * @throws \Throwable
 */
function throw_unless($condition, $exception, ...$parameters)
```

### transform

```php
/**
 * Transform the given value if it is present.
 *
 * @param  mixed  $value
 * @param  callable  $callback
 * @param  mixed  $default
 * @return mixed|null
 */
function transform($value, callable $callback, $default = null)
```

### windows_os

```php
/**
 * Determine if the current environment is Windows based.
 *
 * @return bool
 */
function windows_os()
```

### retry

```php
/**
 * Retry an operation a given number of times.
 *
 * @param  int  $times
 * @param  callable  $callback
 * @param  int|\Closure  $sleepMilliseconds
 * @param  callable|null  $when
 * @return mixed
 *
 * @throws \Throwable
 */
function retry($times, callable $callback, $sleepMilliseconds = 0, $when = null)
```

### rescue

```php
/**
 * Catch a potential exception and return a default value.
 *
 * @param  callable  $callback
 * @param  mixed  $rescue
 * @param  bool  $report
 * @return mixed
 */
function rescue(callable $callback, $rescue = null, $report = true)
```

### e

```php
/**
 * Escape HTML entities in a string.
 *
 * @param  string  $value
 *
 * @return string
 */
function e(string $value): string
```

### object_get

```php
 /**
 * Get an item from an object using "dot" notation.
 *
 * @param  object  $object
 * @param  string  $key
 * @param  mixed $default
 *
 * @return mixed
 */
function object_get(object $object, string $key, $default = null)
```

### tap

```php
/**
 * Call the given Closure with the given value then return the value.
 *
 * @param  mixed $value
 * @param  callable  $callback
 *
 * @return mixed
 */
function tap($value, callable $callback)
```

### value

```php
/**
 * Return the default value of the given value.
 *
 * @param  mixed $value
 * @return mixed
 */
function value($value)
```

### with

```php
/**
 * Return the given object. Useful for chaining.
 *
 * @param  mixed $object
 * @return mixed
 */
function with($object)
```
