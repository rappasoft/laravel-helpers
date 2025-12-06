# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [3.0.0] - 2025-01-XX

### Added
- **35+ new helper functions** from Laravel 10/11/12
- Comprehensive test suite with 105 tests and 234 assertions
- GitHub Actions workflow for automated testing
- PHP 8.1+ support
- Explicit nullable type hints for PHP 8.4 compatibility

#### General Helpers
- `dump()` - Dump variables without terminating execution
- `str()` - String helper wrapper
- `blank()` - Check if value is blank
- `filled()` - Check if value is filled
- `throw_if()` - Conditionally throw exceptions
- `throw_unless()` - Conditionally throw exceptions (inverse)
- `transform()` - Transform values conditionally
- `windows_os()` - Detect Windows OS
- `retry()` - Retry operations with backoff
- `rescue()` - Catch exceptions gracefully

#### String Helpers
- `str_ascii()` - Transliterate UTF-8 to ASCII
- `str_slug()` - Generate URL-friendly slugs
- `str_plural()` - Get plural form of words
- `str_singular()` - Get singular form of words
- `str_ucfirst()` - Uppercase first character (multibyte-safe)
- `str_lcfirst()` - Lowercase first character (multibyte-safe)
- `str_mask()` - Mask portions of strings
- `str_contains_any()` - Check if string contains any substrings
- `str_excerpt()` - Extract text excerpts
- `str_headline()` - Convert to headline case
- `str_is_ascii()` - Check if string is ASCII
- `str_is_json()` - Validate JSON strings
- `str_password()` - Generate secure random passwords
- `str_reverse()` - Reverse strings (multibyte-safe)
- `str_squish()` - Remove extra whitespace
- `str_swap()` - Swap multiple values in strings
- `str_wrap()` - Word wrap strings

#### Array Helpers
- `array_key_first()` - Get first array key
- `array_key_last()` - Get last array key
- `array_map_assoc()` - Map arrays preserving keys
- `array_map_with_keys()` - Map arrays with key access
- `array_undot()` - Expand dotted arrays
- `array_value_first()` - Get first array value
- `array_value_last()` - Get last array value

### Changed
- **BREAKING**: Minimum PHP version increased from 7.3 to 8.1
- Improved `dd()` function to use Symfony VarDumper when available
- Updated function signatures with explicit nullable types for PHP 8.4
- Enhanced documentation and type hints

### Fixed
- Fixed `str_before_last()` using incorrect `str_substr()` → `mb_substr()`
- Fixed `array_flatten()` depth parameter - now optional with default `INF`
- Fixed `array_random()` preserveKeys parameter - now optional
- Fixed `str_swap()` double-replacement issue
- Fixed pluralization rules for irregular words (`child` → `children`)
- Fixed singularization rules for irregular words (`children` → `child`)
- Fixed all PHP 8.4 deprecation warnings

### Removed
- Support for PHP 7.3, 7.4, and 8.0

## [2.x] - Previous Versions

See git history for previous version changes.

---

[3.0.0]: https://github.com/rappasoft/laravel-helpers/compare/v2.x...v3.0.0

