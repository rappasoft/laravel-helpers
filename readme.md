## Laravel 5 Helpers for Non-Laravel Projects

This project takes the useful [Laravel helper functions](http://laravel.com/docs/5.0/helpers) and allows you to use them in Non-Laravel projects.

All dependencies have been extracted out to a single helpers file. No need to import half of Symphony and Laravel to make these work.

## Setup

In the `require` key of `composer.json` file add the following

    "rappasoft/laravel-helpers": "dev-master"

## Documentation

* [Arrays](#arrays)
    * [append_config](#append_config)
    * [array_add](#array_add)
    * [array_build](#array_build)
    * [array_divide](#array_divide)
    * [array_dot](#array_dot)
    * [array_except](#array_except)
    * [array_fetch](#array_fetch)
    * [array_first](#array_first)
    * [array_last](#array_last)
    * [array_flatten](#array_flatten)
    * [array_forgot](#array_forgot)
    * [array_get](#array_get)
    * [array_has](#array_has)
    * [array_only](#array_only)
    * [array_pluck](#array_pluck)
    * [array_pull](#array_pull)
    * [array_set](#array_set)
    * [array_where](#array_where)
    
<a name="arrays"/>
## Arrays

<a name="append_config"/>
### append_config

```php
/**
	 * Assign high numeric IDs to a config item to force appending.
	 *
	 * @param  array  $array
	 * @return array
*/
function append_config(array $array)
```

<a name="array_add"/>
### array_add

```php
/**
	 * Add an element to an array using "dot" notation if it doesn't exist.
	 *
	 * @param  array   $array
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return array
*/
function array_add($array, $key, $value)
```

<a name="array_build"/>
### array_build

```php
/**
	 * Build a new array using a callback.
	 *
	 * @param  array     $array
	 * @param  \Closure  $callback
	 * @return array
*/
function array_build($array, Closure $callback)
```

<a name="array_divide"/>
### array_divide

```php
/**
	 * Divide an array into two arrays. One with keys and the other with values.
	 *
	 * @param  array  $array
	 * @return array
*/
function array_divide($array)
```

<a name="array_dot"/>
### array_dot

```php
/**
	 * Flatten a multi-dimensional associative array with dots.
	 *
	 * @param  array   $array
	 * @param  string  $prepend
	 * @return array
*/
function array_dot($array, $prepend = '')
```

<a name="array_except"/>
### array_except

```php
/**
	 * Get all of the given array except for a specified array of items.
	 *
	 * @param  array  $array
	 * @param  array|string  $keys
	 * @return array
*/
function array_except($array, $keys)
```

<a name="array_fetch"/>
### array_fetch

```php
/**
	 * Fetch a flattened array of a nested array element.
	 *
	 * @param  array   $array
	 * @param  string  $key
	 * @return array
*/
function array_fetch($array, $key)
```

<a name="array_first"/>
### array_first

```php
/**
	 * Return the first element in an array passing a given truth test.
	 *
	 * @param  array     $array
	 * @param  \Closure  $callback
	 * @param  mixed     $default
	 * @return mixed
*/
function array_first($array, $callback, $default = null)
```

<a name="array_last"/>
### array_last

```php
/**
	 * Return the last element in an array passing a given truth test.
	 *
	 * @param  array     $array
	 * @param  \Closure  $callback
	 * @param  mixed     $default
	 * @return mixed
*/
function array_last($array, $callback, $default = null)
```

<a name="array_flatten"/>
### array_flatten

```php
/**
	 * Flatten a multi-dimensional array into a single level.
	 *
	 * @param  array  $array
	 * @return array
*/
function array_flatten($array)
```

<a name="array_forgot"/>
### array_forgot

```php
/**
	 * Remove one or many array items from a given array using "dot" notation.
	 *
	 * @param  array  $array
	 * @param  array|string  $keys
	 * @return void
*/
function array_forget(&$array, $keys)
```

<a name="array_get"/>
### array_get

```php
/**
	 * Get an item from an array using "dot" notation.
	 *
	 * @param  array   $array
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
*/
function array_get($array, $key, $default = null)
```

<a name="array_has"/>
### array_has

```php
/**
	 * Check if an item exists in an array using "dot" notation.
	 *
	 * @param  array   $array
	 * @param  string  $key
	 * @return bool
*/
function array_has($array, $key)
```

<a name="array_only"/>
### array_only

```php
/**
	 * Get a subset of the items from the given array.
	 *
	 * @param  array  $array
	 * @param  array|string  $keys
	 * @return array
*/
function array_only($array, $keys)
```

<a name="array_pluck"/>
### array_pluck

```php
/**
	 * Pluck an array of values from an array.
	 *
	 * @param  array   $array
	 * @param  string  $value
	 * @param  string  $key
	 * @return array
*/
function array_pluck($array, $value, $key = null)
```

<a name="array_pull"/>
### array_pull

```php
/**
	 * Get a value from the array, and remove it.
	 *
	 * @param  array   $array
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
*/
function array_pull(&$array, $key, $default = null)
```

<a name="array_set"/>
### array_set

```php
/**
	 * Set an array item to a given value using "dot" notation.
	 *
	 * If no key is given to the method, the entire array will be replaced.
	 *
	 * @param  array   $array
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return array
*/
function array_set(&$array, $key, $value)
```

<a name="array_where"/>
### array_where

```php
/**
	 * Filter the array using the given Closure.
	 *
	 * @param  array     $array
	 * @param  \Closure  $callback
	 * @return array
*/
function array_where($array, Closure $callback)
```