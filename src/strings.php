<?php

/**
 * Laravel Helpers Package
 * Extracted by Anthony Rappa
 * rappa819@gmail.com
 */

if (! function_exists('preg_replace_array')) {
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
    {
        return preg_replace_callback($pattern, function () use (&$replacements) {
            foreach ($replacements as $key => $value) {
                return array_shift($replacements);
            }
        }, $subject);
    }
}

if (! function_exists('str_after')) {
    /**
     * Return the remainder of a string after the first occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     *
     * @return string
     */
    function str_after(string $subject, string $search): string
    {
        return $search === '' ? $subject : array_reverse(explode($search, $subject, 2))[0];
    }
}

if (! function_exists('str_after_last')) {
    /**
     * Return the remainder of a string after the last occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     *
     * @return string
     */
    function str_after_last(string $subject, string $search): string
    {
        if ($search === '') {
            return $subject;
        }

        $position = strrpos($subject, (string) $search);

        if ($position === false) {
            return $subject;
        }

        return substr($subject, $position + strlen($search));
    }
}

if (! function_exists('str_before')) {
    /**
     * Get the portion of a string before the first occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     *
     * @return string
     */
    function str_before(string $subject, string $search): string
    {
        if ($search === '') {
            return $subject;
        }

        $result = strstr($subject, (string) $search, true);

        return $result === false ? $subject : $result;
    }
}

if (! function_exists('str_before_last')) {
    /**
     * Get the portion of a string before the last occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     *
     * @return string
     */
    function str_before_last(string $subject, string $search): string
    {
        if ($search === '') {
            return $subject;
        }

        $pos = mb_strrpos($subject, $search);

        if ($pos === false) {
            return $subject;
        }

        return str_substr($subject, 0, $pos);
    }
}

if (! function_exists('str_between')) {
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
    {
        if ($from === '' || $to === '') {
            return $subject;
        }

        return str_before_last(str_after($subject, $from), $to);
    }
}

if (! function_exists('str_contains')) {
    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string  $haystack
     * @param  string|string[]  $needles
     *
     * @return bool
     */
    function str_contains(string $haystack, $needles): bool
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }
}

if (! function_exists('str_contains_all')) {
    /**
     * Determine if a given string contains all array values.
     *
     * @param  string  $haystack
     * @param  string[]  $needles
     *
     * @return bool
     */
    function str_contains_all(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if (!str_contains($haystack, $needle)) {
                return false;
            }
        }

        return true;
    }
}

if (! function_exists('str_ends_with')) {
    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string  $haystack
     * @param  string|string[]  $needles
     *
     * @return bool
     */
    function str_ends_with(string $haystack, $needles): bool
    {
        foreach ((array) $needles as $needle) {
            if (
                $needle !== '' && $needle !== null
                && substr($haystack, -strlen($needle)) === (string) $needle
            ) {
                return true;
            }
        }

        return false;
    }
}

if (! function_exists('str_finish')) {
    /**
     * Cap a string with a single instance of a given value.
     *
     * @param  string  $value
     * @param  string  $cap
     *
     * @return string
     */
    function str_finish(string $value, string $cap): string
    {
        $quoted = preg_quote($cap, '/');

        return preg_replace('/(?:'.$quoted.')+$/u', '', $value).$cap;
    }
}

if (! function_exists('str_is')) {
    /**
     * Determine if a given string matches a given pattern.
     *
     * @param  string|array  $pattern
     * @param  string  $value
     *
     * @return bool
     */
    function str_is($pattern, string $value): bool
    {
        $patterns = array_wrap($pattern);

        if (empty($patterns)) {
            return false;
        }

        foreach ($patterns as $pattern) {
            // If the given value is an exact match we can of course return true right
            // from the beginning. Otherwise, we will translate asterisks and do an
            // actual pattern match against the two strings to see if they match.
            if ($pattern == $value) {
                return true;
            }

            $pattern = preg_quote($pattern, '#');

            // Asterisks are translated into zero-or-more regular expression wildcards
            // to make it convenient to check if the strings starts with the given
            // pattern such as "library/*", making any string check convenient.
            $pattern = str_replace('\*', '.*', $pattern);

            if (preg_match('#^'.$pattern.'\z#u', $value) === 1) {
                return true;
            }
        }

        return false;
    }
}

if (! function_exists('str_is_uuid')) {
    /**
     * Determine if a given string is a valid UUID.
     *
     * @param  string  $value
     *
     * @return bool
     */
    function str_is_uuid(string $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return preg_match('/^[\da-f]{8}-[\da-f]{4}-[\da-f]{4}-[\da-f]{4}-[\da-f]{12}$/iD', $value) > 0;
    }
}

if (! function_exists('str_kebab')) {
    /**
     * Convert a string to kebab case.
     *
     * @param  string  $value
     *
     * @return string
     */
    function str_kebab(string $value): string
    {
        return str_snake($value, '-');
    }
}

if (! function_exists('str_length')) {
    /**
     * Return the length of the given string.
     *
     * @param  string  $value
     * @param  string|null  $encoding
     *
     * @return int
     */
    function str_length(string $value, string $encoding = null): int
    {
        if ($encoding) {
            return mb_strlen($value, $encoding);
        }

        return mb_strlen($value);
    }
}

if (! function_exists('str_limit')) {
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
    {
        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }

        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
    }
}

if (! function_exists('str_lower')) {
    /**
     * Convert the given string to lower-case.
     *
     * @param  string  $value
     *
     * @return string
     */
    function str_lower(string $value): string
    {
        return mb_strtolower($value, 'UTF-8');
    }
}

if (! function_exists('str_words')) {
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
    {
        preg_match('/^\s*+(?:\S++\s*+){1,'.$words.'}/u', $value, $matches);

        if (!isset($matches[0]) || str_length($value) === str_length($matches[0])) {
            return $value;
        }

        return rtrim($matches[0]).$end;
    }
}

if (! function_exists('str_match')) {
    /**
     * Get the string matching the given pattern.
     *
     * @param  string  $pattern
     * @param  string  $subject
     *
     * @return string
     */
    function str_match(string $pattern, string $subject): string
    {
        preg_match($pattern, $subject, $matches);

        if (!$matches) {
            return '';
        }

        return $matches[1] ?? $matches[0];
    }
}

if (! function_exists('str_pad_both')) {
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
    {
        return str_pad($value, $length, $pad, STR_PAD_BOTH);
    }
}

if (! function_exists('str_pad_left')) {
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
    {
        return str_pad($value, $length, $pad, STR_PAD_LEFT);
    }
}

if (! function_exists('str_pad_right')) {
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
    {
        return str_pad($value, $length, $pad, STR_PAD_RIGHT);
    }
}

if (! function_exists('str_random')) {
    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int  $length
     *
     * @return string
     */
    function str_random(int $length = 16): string
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }
}

if (! function_exists('str_replace_array')) {
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
    {
        $segments = explode($search, $subject);

        $result = array_shift($segments);

        foreach ($segments as $segment) {
            $result .= (array_shift($replace) ?? $search).$segment;
        }

        return $result;
    }
}

if (! function_exists('str_replace_first')) {
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
    {
        if ($search === '') {
            return $subject;
        }

        $position = strpos($subject, $search);

        if ($position !== false) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }
}

if (! function_exists('str_replace_last')) {
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
    {
        if ($search === '') {
            return $subject;
        }

        $position = strrpos($subject, $search);

        if ($position !== false) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }
}

if (! function_exists('str_remove')) {
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
    {
        $subject = $caseSensitive
            ? str_replace($search, '', $subject)
            : str_ireplace($search, '', $subject);

        return $subject;
    }
}

if (! function_exists('str_start')) {
    /**
     * Begin a string with a single instance of a given value.
     *
     * @param  string  $value
     * @param  string  $prefix
     *
     * @return string
     */
    function str_start(string $value, string $prefix): string
    {
        $quoted = preg_quote($prefix, '/');

        return $prefix.preg_replace('/^(?:'.$quoted.')+/u', '', $value);
    }
}

if (! function_exists('str_upper')) {
    /**
     * Convert the given string to upper-case.
     *
     * @param  string  $value
     *
     * @return string
     */
    function str_upper(string $value): string
    {
        return mb_strtoupper($value, 'UTF-8');
    }
}

if (! function_exists('str_title')) {
    /**
     * Convert the given string to title case.
     *
     * @param  string  $value
     *
     * @return string
     */
    function str_title(string $value): string
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }
}

if (! function_exists('str_snake')) {
    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     *
     * @return string
     */
    function str_snake(string $value, string $delimiter = '_'): string
    {
        static $snakeCache = [];
        $key = $value;

        if (isset($snakeCache[$key][$delimiter])) {
            return $snakeCache[$key][$delimiter];
        }

        if (!ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', ucwords($value));

            $value = str_lower(preg_replace('/(.)(?=[A-Z])/u', '$1'.$delimiter, $value));
        }

        return $snakeCache[$key][$delimiter] = $value;
    }
}

if (! function_exists('str_starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|string[]  $needles
     *
     * @return bool
     */
    function str_starts_with(string $haystack, $needles): bool
    {
        foreach ((array) $needles as $needle) {
            if ((string) $needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0) {
                return true;
            }
        }

        return false;
    }
}

if (! function_exists('str_studly')) {
    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     *
     * @return string
     */
    function str_studly(string $value): string
    {
        static $studlyCache = [];
        $key = $value;

        if (isset($studlyCache[$key])) {
            return $studlyCache[$key];
        }

        $value = ucwords(str_replace(['-', '_'], ' ', $value));

        return $studlyCache[$key] = str_replace(' ', '', $value);
    }
}
