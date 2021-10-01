![Package Logo](https://banners.beyondco.de/Laravel%20Helpers.png?theme=dark&packageManager=composer+require&packageName=rappasoft%2Flaravel-helpers&pattern=architect&style=style_1&description=For+Non-Laravel+Projects&md=1&showWatermark=0&fontSize=100px&images=hand)

## Laravel Helpers for Non-Laravel Projects

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rappasoft/laravel-helpers.svg?style=flat-square)](https://packagist.org/packages/rappasoft/laravel-helpers)
[![Total Downloads](https://img.shields.io/packagist/dt/rappasoft/laravel-helpers.svg?style=flat-square)](https://packagist.org/packages/rappasoft/laravel-helpers)

This project takes the useful [Laravel helper functions](https://laravel.com/docs/8.x/helpers#introduction) and allows you to use them in Non-Laravel projects.

## Installation

```
composer require rappasoft/laravel-helpers
```

## Documentation

* [Arrays](#arrays)
    * [array_accessible](#array_accessible)
    * [array_add](#array_add)
    * [array_collapse](#array_collapse)
    * [array_cross_join](#array_cross_join)
    * [array_divide](#array_divide)
    * [array_dot](#array_dot)
    * [array_except](#array_except)
    * [array_exists](#array_exists)
    * [array_first](#array_first)
    * [array_last](#array_last)
    * [array_flatten](#array_flatten)
    * [array_forget](#array_forget)
    * [array_get](#array_get)
    * [array_has](#array_has)
    * [array_has_any](#array_has_any)
    * [array_is_assoc](#array_is_assoc)
    * [array_only](#array_only)
    * [array_pluck](#array_pluck)
    * [array_prepend](#array_prepend)
    * [array_pull](#array_pull)
    * [array_query](#array_query)
    * [array_random](#array_random)
    * [array_set](#array_set)
    * [array_shuffle](#array_shuffle)
    * [array_sort_recursive](#array_sort_recursive)
    * [array_to_css_classes](#array_to_css_classes)
    * [array_where](#array_where)
    * [array_wrap](#array_wrap)
    * [data_fill](#data_fill)
    * [data_get](#data_get)
    * [data_set](#data_set)
    * [head](#head)
    * [last](#last)
* [Strings](#strings)
    * [preg_replace_array](#preg_replace_array)
    * [str_after](#str_after)
    * [str_after_last](#str_after_last)
    * [str_before](#str_before)
    * [str_before_last](#str_before_last)
    * [str_between](#str_between)
    * [str_contains](#str_contains)
    * [str_contains_all](#str_contains_all)
    * [str_ends_with](#str_ends_with)
    * [str_finish](#str_finish)
    * [str_is](#str_is)
    * [str_is_uuid](#str_is_uuid)
    * [str_kebab](#str_kebab)
    * [str_length](#str_length)
    * [str_limit](#str_limit)
    * [str_lower](#str_lower)
    * [str_words](#str_words)
    * [str_match](#str_match)
    * [str_pad_both](#str_pad_both)
    * [str_pad_left](#str_pad_left)
    * [str_pad_right](#str_pad_right)
    * [str_random](#str_random)
    * [str_replace_array](#str_replace_array)
    * [str_replace_first](#str_replace_first)
    * [str_replace_last](#str_replace_last)
    * [str_remove](#str_remove)
    * [str_start](#str_start)
    * [str_upper](#str_upper)
    * [str_title](#str_title)
    * [str_snake](#str_snake)
    * [str_starts_with](#str_starts_with)
    * [str_studly](#str_studly)
* [Classes](#classes)
    * [class_basename](#class_basename)
    * [class_uses_recursive](#class_uses_recursive)
    * [trait_uses_recursive](#trait_uses_recursive)
* [Miscellaneous](#miscellaneous)
    * [dd](#dd)
    * [e](#e)
    * [object_get](#object_get)
    * [tap](#tap)
    * [value](#value)
    * [with](#with)
    
## Arrays
<a name="arrays"/>

### array_accessible
<a name="array_accessible"/>

```php
/**
 * Determine whether the given value is array accessible.
 *
 * @param  mixed  $value
 *
 * @return bool
 */
function array_accessible($value): bool
``````

### array_add
<a name="array_add"/>

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
````

### array_collapse
<a name="array_collapse"/>

```php
/**
 * Collapse an array of arrays into a single array.
 *
 * @param  iterable  $array
 *
 * @return array
 */
function array_collapse(iterable $array): array
````

### array_cross_join
<a name="array_cross_join"/>

```php
/**
 * Cross join the given arrays, returning all possible permutations.
 *
 * @param  iterable  ...$arrays
 *
 * @return array
 */
function array_cross_join(...$arrays): array
````

### array_divide
<a name="array_divide"/>

```php
/**
 * Divide an array into two arrays. One with keys and the other with values.
 *
 * @param  array  $array
 *
 * @return array
 */
function array_divide(array $array): array
````

### array_dot
<a name="array_dot"/>

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
````

### array_except
<a name="array_except"/>

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
````

### array_exists
<a name="array_exists"/>

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
````

### array_first
<a name="array_first"/>

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
````

### array_last
<a name="array_last"/>

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
````

### array_flatten
<a name="array_flatten"/>

```php
/**
 * Flatten a multi-dimensional array into a single level.
 *
 * @param  iterable  $array
 * @param  int  $depth
 *
 * @return array
 */
function array_flatten(iterable $array, int $depth): array
```

### array_forget
<a name="array_forget"/>

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
<a name="array_get"/>

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
<a name="array_has"/>

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
<a name="array_has_any"/>

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
<a name="array_is_assoc"/>

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
<a name="array_only"/>

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
<a name="array_pluck"/>

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
<a name="array_prepend"/>

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
<a name="array_pull"/>

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
<a name="array_query"/>

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
<a name="array_random"/>

```php
/**
 * Get one or a specified number of random values from an array.
 *
 * @param  array  $array
 * @param  int|null  $number
 * @param  bool|false  $preserveKeys
 *
 * @return mixed
 *
 * @throws \InvalidArgumentException
 */
function array_random(array $array, int $number = null, bool $preserveKeys)
```

### array_set
<a name="array_set"/>

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
<a name="array_shuffle"/>

```php
 /**
 * Shuffle the given array and return the result.
 *
 * @param  array  $array
 * @param  int|null  $seed
 *
 * @return array
 */
function array_shuffle(array $array, int $seed = null): array
```

### array_sort_recursive
<a name="array_sort_recursive"/>

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
<a name="array_to_css_classes"/>

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
<a name="array_where"/>

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
<a name="array_wrap"/>

```php
/**
 * If the given value is not an array and not null, wrap it in one.
 *
 * @param  mixed  $value
 *
 * @return array
 */
function array_wrap($value): array
````

### data_fill
<a name="data_fill"/>

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
<a name="data_get"/>

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
<a name="data_set"/>

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
<a name="head"/>

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
<a name="last"/>

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


## Strings
<a name="strings"/>

### preg_replace_array
<a name="preg_replace_array"/>

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
<a name="str_after"/>

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
<a name="str_after_last"/>

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
<a name="str_before"/>

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
<a name="str_before_last"/>

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
<a name="str_between"/>

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
<a name="str_contains"/>

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
<a name="str_contains_all"/>

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
<a name="str_ends_with"/>

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
<a name="str_finish"/>

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
<a name="str_is"/>

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
<a name="str_is_uuid"/>

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
<a name="str_kebab"/>

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
<a name="str_length"/>

```php
/**
 * Return the length of the given string.
 *
 * @param  string  $value
 * @param  string|null  $encoding
 *
 * @return int
 */
function str_length(string $value, string $encoding = null): int
```

### str_limit
<a name="str_limit"/>

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
<a name="str_lower"/>

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
<a name="str_words"/>

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
<a name="str_match"/>

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
<a name="str_pad_both"/>

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
<a name="str_pad_left"/>

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
<a name="str_pad_right"/>

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
<a name="str_random"/>

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
<a name="str_replace_array"/>

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
<a name="str_replace_first"/>

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
<a name="str_replace_last"/>

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
<a name="str_remove"/>

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
<a name="str_start"/>

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
<a name="str_upper"/>

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
<a name="str_title"/>

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
<a name="str_snake"/>

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
<a name="str_starts_with"/>

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
<a name="str_studly"/>

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

## Classes
<a name="classes"/>

### class_basename
<a name="class_basename"/>

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
<a name="class_uses_recursive"/>

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
<a name="trait_uses_recursive"/>

```php
/**
 * Returns all traits used by a trait and its traits.
 *
 * @param  string  $trait
 * @return array
 */
function trait_uses_recursive($trait): array
```

## Miscellaneous
<a name="miscellaneous"/>

### dd
<a name="dd"/>

```php
/**
 * Dump the passed variables and end the script.
 *
 * @param  mixed
 * @return void
 */
function dd()
```

### e
<a name="e"/>

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
<a name="object_get"/>

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
<a name="tap"/>

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
<a name="value"/>

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
<a name="with"/>

```php
/**
 * Return the given object. Useful for chaining.
 *
 * @param  mixed $object
 * @return mixed
 */
function with($object)
```


## License

Since the Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT), this project is licensed under the same license.
