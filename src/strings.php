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

        return mb_substr($subject, 0, $pos);
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
    function str_ends_with(string $haystack, string|array $needles): bool
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
    function str_length(string $value, ?string $encoding = null): int
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
    function str_starts_with(string $haystack, string|array $needles): bool
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

if (! function_exists('str_pascal')) {
    /**
     * Convert a string to pascal case.
     *
     * @param  string  $value
     *
     * @return string
     */
    function str_pascal(string $value): string
    {
        $words = preg_replace('/[\p{P}]/u', ' ', $value);
    	
    	return str_replace(' ', '', ucwords($words));
    }
}

if (! function_exists('str_camel')) {
    /**
     * Convert a string to camel case.
     *
     * @param  string  $value
     *
     * @return string
     */
    function str_camel(string $value): string
    {
        return lcfirst(str_pascal($value));
    }
}

if (! function_exists('str_uuid4')) {
    /**
     * Generate a UUID (version 4).
     *
     * @return string
     */
    function str_uuid4() {
        $bytes = random_bytes(16);

        $bytes[6] = chr(ord($bytes[6]) & 0x0f | 0x40);
        $bytes[8] = chr(ord($bytes[8]) & 0x3f | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));
    }
}

if (! function_exists('str_ascii')) {
    /**
     * Transliterate a UTF-8 value to ASCII.
     *
     * @param  string  $value
     * @param  string  $language
     * @return string
     */
    function str_ascii(string $value, string $language = 'en'): string
    {
        $languageSpecific = [
            'de' => [
                'ä' => 'ae', 'ö' => 'oe', 'ü' => 'ue',
                'Ä' => 'Ae', 'Ö' => 'Oe', 'Ü' => 'Ue',
                'ß' => 'ss',
            ],
        ];

        if (isset($languageSpecific[$language])) {
            $value = str_replace(
                array_keys($languageSpecific[$language]),
                array_values($languageSpecific[$language]),
                $value
            );
        }

        if (function_exists('transliterator_transliterate') && function_exists('iconv')) {
            $value = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $value);
        } elseif (function_exists('iconv')) {
            $value = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);
        }

        return preg_replace('/[^\x20-\x7E]/u', '', $value);
    }
}

if (! function_exists('str_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @param  string|null  $language
     * @return string
     */
    function str_slug(string $title, string $separator = '-', ?string $language = 'en'): string
    {
        $title = str_ascii($title, $language);

        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = str_replace('@', $separator.'at'.$separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}

if (! function_exists('str_plural')) {
    /**
     * Get the plural form of an English word.
     *
     * @param  string  $value
     * @param  int|array|\Countable  $count
     * @return string
     */
    function str_plural(string $value, $count = 2): string
    {
        if (is_countable($count)) {
            $count = count($count);
        }

        if ((int) abs($count) === 1) {
            return $value;
        }

        $plural = [
            '/(quiz)$/i' => '$1zes',
            '/^(ox)$/i' => '$1en',
            '/([m|l])ouse$/i' => '$1ice',
            '/(matr|vert|ind)ix|ex$/i' => '$1ices',
            '/(x|ch|ss|sh)$/i' => '$1es',
            '/([^aeiouy]|qu)y$/i' => '$1ies',
            '/(hive)$/i' => '$1s',
            '/(?:([^f])fe|([lr])f)$/i' => '$1$2ves',
            '/sis$/i' => 'ses',
            '/([ti])um$/i' => '$1a',
            '/(buffal|tomat)o$/i' => '$1oes',
            '/(bu)s$/i' => '$1ses',
            '/(alias|status)$/i' => '$1es',
            '/(octop|vir)us$/i' => '$1i',
            '/(ax|test)is$/i' => '$1es',
            '/(child)$/i' => '$1ren',
            '/s$/i' => 's',
            '/$/' => 's',
        ];

        foreach ($plural as $rule => $replacement) {
            if (preg_match($rule, $value)) {
                return preg_replace($rule, $replacement, $value);
            }
        }

        return $value;
    }
}

if (! function_exists('str_singular')) {
    /**
     * Get the singular form of an English word.
     *
     * @param  string  $value
     * @return string
     */
    function str_singular(string $value): string
    {
        $singular = [
            '/(quiz)zes$/i' => '$1',
            '/(matrices)$/i' => '$1',
            '/(vert|ind)ices$/i' => '$1ex',
            '/^(ox)en$/i' => '$1',
            '/(alias|status)es$/i' => '$1',
            '/(octop|vir)i$/i' => '$1us',
            '/(cris|ax|test)es$/i' => '$1is',
            '/(shoe)s$/i' => '$1',
            '/(o)es$/i' => '$1',
            '/(bus)es$/i' => '$1',
            '/([m|l])ice$/i' => '$1ouse',
            '/(x|ch|ss|sh)es$/i' => '$1',
            '/(m)ovies$/i' => '$1ovie',
            '/(s)eries$/i' => '$1eries',
            '/([^aeiouy]|qu)ies$/i' => '$1y',
            '/([lr])ves$/i' => '$1f',
            '/(tive)s$/i' => '$1',
            '/(hive)s$/i' => '$1',
            '/(li|wi|kni)ves$/i' => '$1fe',
            '/(shea|loa|lea|thie)ves$/i' => '$1f',
            '/(^analy)ses$/i' => '$1sis',
            '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '$1$2sis',
            '/([ti])a$/i' => '$1um',
            '/(n)ews$/i' => '$1ews',
            '/(h|bl)ouses$/i' => '$1ouse',
            '/(corpse)s$/i' => '$1',
            '/(us)es$/i' => '$1',
            '/(children)$/i' => 'child',
            '/s$/i' => '',
        ];

        foreach ($singular as $rule => $replacement) {
            if (preg_match($rule, $value)) {
                return preg_replace($rule, $replacement, $value);
            }
        }

        return $value;
    }
}

if (! function_exists('str_ucfirst')) {
    /**
     * Make a string's first character uppercase.
     *
     * @param  string  $string
     * @return string
     */
    function str_ucfirst(string $string): string
    {
        return mb_strtoupper(mb_substr($string, 0, 1)).mb_substr($string, 1);
    }
}

if (! function_exists('str_lcfirst')) {
    /**
     * Make a string's first character lowercase.
     *
     * @param  string  $string
     * @return string
     */
    function str_lcfirst(string $string): string
    {
        return mb_strtolower(mb_substr($string, 0, 1)).mb_substr($string, 1);
    }
}

if (! function_exists('str_mask')) {
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
    {
        if ($character === '') {
            return $string;
        }

        $strlen = mb_strlen($string);
        $startIndex = $index;

        if ($index < 0) {
            $startIndex = max(0, $strlen + $index);
        }

        if ($length === null) {
            $length = $strlen - $startIndex;
        }

        $segmentLen = min($length, $strlen - $startIndex);
        
        if ($segmentLen <= 0) {
            return $string;
        }

        $start = mb_substr($string, 0, $startIndex);
        $end = mb_substr($string, $startIndex + $segmentLen);
        $masked = str_repeat(mb_substr($character, 0, 1), $segmentLen);

        return $start.$masked.$end;
    }
}

if (! function_exists('str_contains_any')) {
    /**
     * Determine if a given string contains any of the given substrings.
     *
     * @param  string  $haystack
     * @param  string[]  $needles
     * @return bool
     */
    function str_contains_any(string $haystack, array $needles): bool
    {
        if (empty($needles)) {
            return false;
        }

        foreach ($needles as $needle) {
            if (str_contains($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }
}

if (! function_exists('str_excerpt')) {
    /**
     * Extract an excerpt from text that matches the first instance of a phrase.
     *
     * @param  string  $text
     * @param  string  $phrase
     * @param  array  $options
     * @return string|null
     */
    function str_excerpt(string $text, string $phrase = '', array $options = []): ?string
    {
        $radius = $options['radius'] ?? 100;
        $omission = $options['omission'] ?? '...';

        preg_match('/^(.*?)('.preg_quote($phrase).')(.*)$/iu', $text, $matches);

        if (empty($matches)) {
            return null;
        }

        $start = str_lower(mb_substr($matches[1], -$radius));
        $end = mb_substr($matches[3], 0, $radius);

        $start = str_starts_with($matches[1], $start) ? '...' : '';
        $end = str_ends_with($matches[3], $end) ? '...' : '';

        return $start.trim($matches[1]).$matches[2].trim($matches[3]).$end;
    }
}

if (! function_exists('str_headline')) {
    /**
     * Convert the given string to title case for each word.
     *
     * @param  string  $value
     * @return string
     */
    function str_headline(string $value): string
    {
        $parts = explode(' ', $value);

        $parts = array_map(function ($part) {
            $part = str_lower($part);

            return str_ucfirst($part);
        }, $parts);

        return implode(' ', $parts);
    }
}

if (! function_exists('str_is_ascii')) {
    /**
     * Determine if a given string is 7 bit ASCII.
     *
     * @param  string  $value
     * @return bool
     */
    function str_is_ascii(string $value): bool
    {
        return ! preg_match('/[^\x00-\x7F]/', $value);
    }
}

if (! function_exists('str_is_json')) {
    /**
     * Determine if a given string is valid JSON.
     *
     * @param  string  $value
     * @return bool
     */
    function str_is_json(string $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        if (trim($value) === '') {
            return false;
        }

        json_decode($value, true);

        return json_last_error() === JSON_ERROR_NONE;
    }
}

if (! function_exists('str_password')) {
    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int  $length
     * @return string
     */
    function str_password(int $length = 32): string
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(
                str_replace(['/', '+', '='], '', base64_encode($bytes)),
                0,
                $size
            );
        }

        return $string;
    }
}

if (! function_exists('str_reverse')) {
    /**
     * Reverse the given string.
     *
     * @param  string  $value
     * @return string
     */
    function str_reverse(string $value): string
    {
        if (function_exists('mb_str_split')) {
            return implode(array_reverse(mb_str_split($value)));
        }

        $length = mb_strlen($value);
        $reversed = '';
        for ($i = $length - 1; $i >= 0; $i--) {
            $reversed .= mb_substr($value, $i, 1);
        }

        return $reversed;
    }
}

if (! function_exists('str_squish')) {
    /**
     * Remove all "extra" blank space from the given string.
     *
     * @param  string  $value
     * @return string
     */
    function str_squish(string $value): string
    {
        return preg_replace('~(\s|\x{3164})+~u', ' ', preg_replace('~^[\s\x{FEFF}]+|[\s\x{FEFF}]+$~u', '', $value));
    }
}

if (! function_exists('str_swap')) {
    /**
     * Swap multiple values in a string with other values.
     *
     * @param  array  $map
     * @param  string  $subject
     * @return string
     */
    function str_swap(array $map, string $subject): string
    {
        // Need to swap in a way that doesn't cause double replacement
        // Use a temporary placeholder approach
        $placeholders = [];
        $i = 0;
        foreach ($map as $search => $replace) {
            $placeholder = "\x00PLACEHOLDER{$i}\x00";
            $placeholders[$placeholder] = $replace;
            $subject = str_replace($search, $placeholder, $subject);
            $i++;
        }
        
        foreach ($placeholders as $placeholder => $replace) {
            $subject = str_replace($placeholder, $replace, $subject);
        }
        
        return $subject;
    }
}

if (! function_exists('str_wrap')) {
    /**
     * Wrap a string to a given number of characters.
     *
     * @param  string  $value
     * @param  int  $width
     * @param  string  $break
     * @return string
     */
    function str_wrap(string $value, int $width = 75, string $break = "\n"): string
    {
        return wordwrap($value, $width, $break);
    }
}

if (! function_exists('str_jwt')) {
    /**
     * Generate a JWT.
     * 
     * @param  array  $payload
     *
     * @return string
     */
    function str_jwt(array $payload) {
        $patterns = ['+', '/', '='];

		$replacements = ['-', '_', ''];

        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $chain[] = str_replace($patterns, $replacements, base64_encode($header));

        $payload = json_encode($payload);
        $chain[] = str_replace($patterns, $replacements, base64_encode($payload));

        $signature = hash_hmac('sha256', $chain[0] . "." . $chain[1], 'abC123!', true);
        $chain[] = str_replace($patterns, $replacements, base64_encode($signature));

        return implode('.', $chain);
    }
}