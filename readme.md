## Laravel 5 Helpers for Non-Laravel Projects

This project takes the useful [Laravel helper functions](http://laravel.com/docs/5.0/helpers) and allows you to use them in Non-Laravel projects.

All dependencies have been extracted out to a single helpers file. No need to import half of Symphony and Laravel to make these work.

## Setup

In the `require` key of `composer.json` file add the following

    "rappasoft/laravel-helpers": "dev-master"

## Documentation

* [Methods](#methods)
    * [append_config](#append_config)
    
<a name="methods"/>
## Methods

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