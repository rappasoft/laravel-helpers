<?php

/**
 * Laravel Helpers Package
 * Extracted by Anthony Rappa
 * rappa819@gmail.com
 */

if (!function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed  ...$vars
     * @return never
     */
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            if (function_exists('dump')) {
                dump($v);
            } elseif (class_exists(\Symfony\Component\VarDumper\VarDumper::class)) {
                \Symfony\Component\VarDumper\VarDumper::dump($v);
            } else {
                var_dump($v);
            }
        }

        die(1);
    }
}

if (!function_exists('e')) {
    /**
     * Escape HTML entities in a string.
     *
     * @param  string  $value
     *
     * @return string
     */
    function e(string $value): string
    {
        return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
    }
}

if (!function_exists('object_get')) {
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
    {
        if (trim($key) == '') {
            return $object;
        }

        foreach (explode('.', $key) as $segment) {
            if (!is_object($object) || !isset($object->{$segment})) {
                return value($default);
            }

            $object = $object->{$segment};
        }

        return $object;
    }
}

if (!function_exists('tap')) {
    /**
     * Call the given Closure with the given value then return the value.
     *
     * @param  mixed $value
     * @param  callable  $callback
     *
     * @return mixed
     */
    function tap($value, callable $callback)
    {
        $callback($value);

        return $value;
    }
}

if (!function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (!function_exists('with')) {
    /**
     * Return the given object. Useful for chaining.
     *
     * @param  mixed $object
     * @return mixed
     */
    function with($object)
    {
        return $object;
    }
}

if (!function_exists('dump')) {
    /**
     * Dump the passed variables.
     *
     * @param  mixed  ...$vars
     * @return mixed
     */
    function dump(...$vars)
    {
        foreach ($vars as $v) {
            if (class_exists(\Symfony\Component\VarDumper\VarDumper::class)) {
                \Symfony\Component\VarDumper\VarDumper::dump($v);
            } else {
                var_dump($v);
            }
        }

        if (func_num_args() > 0) {
            return func_get_arg(0);
        }
    }
}

if (!function_exists('str')) {
    /**
     * Get a string helper instance or return the string.
     *
     * @param  string|null  $string
     * @return string|object
     */
    function str($string = null)
    {
        if (func_num_args() === 0) {
            return new class {
                public function __call($method, $parameters)
                {
                    $function = 'str_'.$method;
                    if (function_exists($function)) {
                        return $function(...$parameters);
                    }
                    throw new \BadMethodCallException("Method {$method} does not exist.");
                }
            };
        }

        return $string ?? '';
    }
}

if (!function_exists('blank')) {
    /**
     * Determine if the given value is "blank".
     *
     * @param  mixed  $value
     * @return bool
     */
    function blank($value)
    {
        if (is_null($value)) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_numeric($value) || is_bool($value)) {
            return false;
        }

        if ($value instanceof Countable) {
            return count($value) === 0;
        }

        return empty($value);
    }
}

if (!function_exists('filled')) {
    /**
     * Determine if a value is "filled".
     *
     * @param  mixed  $value
     * @return bool
     */
    function filled($value)
    {
        return !blank($value);
    }
}

if (!function_exists('throw_if')) {
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
    {
        if ($condition) {
            if (is_string($exception)) {
                $exception = new $exception(...$parameters);
            }

            throw is_string($exception) ? new $exception : $exception;
        }

        return $condition;
    }
}

if (!function_exists('throw_unless')) {
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
    {
        throw_if(!$condition, $exception, ...$parameters);

        return $condition;
    }
}

if (!function_exists('transform')) {
    /**
     * Transform the given value if it is present.
     *
     * @param  mixed  $value
     * @param  callable  $callback
     * @param  mixed  $default
     * @return mixed|null
     */
    function transform($value, callable $callback, $default = null)
    {
        if (filled($value)) {
            return $callback($value);
        }

        if (is_callable($default)) {
            return $default($value);
        }

        return $default;
    }
}

if (!function_exists('windows_os')) {
    /**
     * Determine if the current environment is Windows based.
     *
     * @return bool
     */
    function windows_os()
    {
        return PHP_OS_FAMILY === 'Windows';
    }
}

if (!function_exists('retry')) {
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
    {
        $attempts = 0;
        $times--;

        beginning:
        $attempts++;

        try {
            return $callback($attempts);
        } catch (\Throwable $e) {
            $attempts--;

            if ($times < 1 || ($when && !$when($e))) {
                throw $e;
            }

            $times--;

            if ($sleepMilliseconds) {
                usleep(value($sleepMilliseconds, $attempts) * 1000);
            }

            goto beginning;
        }
    }
}

if (!function_exists('rescue')) {
    /**
     * Catch a potential exception and return a default value.
     *
     * @param  callable  $callback
     * @param  mixed  $rescue
     * @param  bool  $report
     * @return mixed
     */
    function rescue(callable $callback, $rescue = null, $report = true)
    {
        try {
            return $callback();
        } catch (\Throwable $e) {
            if ($report) {
                // In a real Laravel app, this would report to the logger
                // For this package, we'll just silently catch
            }

            return is_callable($rescue) ? $rescue($e) : value($rescue);
        }
    }
}
