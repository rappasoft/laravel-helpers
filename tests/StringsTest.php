<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    public function testStrAfter()
    {
        $this->assertEquals('bar', str_after('foobar', 'foo'));
        // 'fo' appears at position 0, so after it is 'obar'
        $this->assertEquals('obar', str_after('foobar', 'fo'));
        $this->assertEquals('foobar', str_after('foobar', ''));
    }

    public function testStrAfterLast()
    {
        // 'foobarfoo' - last 'foo' is at the end, so after it is empty
        $this->assertEquals('', str_after_last('foobarfoo', 'foo'));
        // Test with a case where there's content after the last occurrence
        $this->assertEquals('bar', str_after_last('foobarfoobar', 'foo'));
        $this->assertEquals('foobarfoo', str_after_last('foobarfoo', ''));
    }

    public function testStrBefore()
    {
        $this->assertEquals('foo', str_before('foobar', 'bar'));
        $this->assertEquals('foobar', str_before('foobar', ''));
    }

    public function testStrBeforeLast()
    {
        $this->assertEquals('foobar', str_before_last('foobarfoo', 'foo'));
        $this->assertEquals('foobarfoo', str_before_last('foobarfoo', ''));
    }

    public function testStrBetween()
    {
        $this->assertEquals('bar', str_between('foobarbaz', 'foo', 'baz'));
        $this->assertEquals('foobarbaz', str_between('foobarbaz', '', ''));
    }

    public function testStrContains()
    {
        $this->assertTrue(str_contains('foobar', 'foo'));
        $this->assertFalse(str_contains('foobar', 'baz'));
        
        // PHP 8.1+ has native str_contains that only accepts string
        // Check if it's our custom function by checking the file location
        try {
            $reflection = new \ReflectionFunction('str_contains');
            $file = $reflection->getFileName();
            // If it's from our src directory, test array support
            if (str_contains($file, 'src/strings.php')) {
                $this->assertTrue(str_contains('foobar', ['foo', 'bar']));
                $this->assertFalse(str_contains('foobar', ['baz', 'qux']));
            }
        } catch (\ReflectionException $e) {
            // Function doesn't exist or can't be reflected
        }
    }

    public function testStrContainsAll()
    {
        $this->assertTrue(str_contains_all('foobar', ['foo', 'bar']));
        $this->assertFalse(str_contains_all('foobar', ['foo', 'baz']));
    }

    public function testStrContainsAny()
    {
        $this->assertTrue(str_contains_any('foobar', ['foo', 'baz']));
        $this->assertFalse(str_contains_any('foobar', ['baz', 'qux']));
        $this->assertFalse(str_contains_any('foobar', []));
    }

    public function testStrEndsWith()
    {
        $this->assertTrue(str_ends_with('foobar', 'bar'));
        // PHP 8.1+ has native str_ends_with that only accepts string
        if (function_exists('str_ends_with') && (new \ReflectionFunction('str_ends_with'))->getNumberOfParameters() === 2) {
            // Native PHP function - just test basic functionality
            $this->assertTrue(str_ends_with('foobar', 'bar'));
        } else {
            // Our custom function supports arrays
            $this->assertTrue(str_ends_with('foobar', ['bar', 'baz']));
        }
        $this->assertFalse(str_ends_with('foobar', 'foo'));
    }

    public function testStrStartsWith()
    {
        $this->assertTrue(str_starts_with('foobar', 'foo'));
        // PHP 8.1+ has native str_starts_with that only accepts string
        if (function_exists('str_starts_with') && (new \ReflectionFunction('str_starts_with'))->getNumberOfParameters() === 2) {
            // Native PHP function - just test basic functionality
            $this->assertTrue(str_starts_with('foobar', 'foo'));
        } else {
            // Our custom function supports arrays
            $this->assertTrue(str_starts_with('foobar', ['foo', 'bar']));
        }
        $this->assertFalse(str_starts_with('foobar', 'bar'));
    }

    public function testStrFinish()
    {
        $this->assertEquals('foobar/', str_finish('foobar', '/'));
        $this->assertEquals('foobar/', str_finish('foobar/', '/'));
        $this->assertEquals('foobar/', str_finish('foobar///', '/'));
    }

    public function testStrStart()
    {
        $this->assertEquals('/foobar', str_start('foobar', '/'));
        $this->assertEquals('/foobar', str_start('/foobar', '/'));
        $this->assertEquals('/foobar', str_start('///foobar', '/'));
    }

    public function testStrIs()
    {
        $this->assertTrue(str_is('foo*', 'foobar'));
        $this->assertTrue(str_is('*bar', 'foobar'));
        $this->assertTrue(str_is('foobar', 'foobar'));
        $this->assertFalse(str_is('foo*', 'barbaz'));
    }

    public function testStrIsUuid()
    {
        $this->assertTrue(str_is_uuid('550e8400-e29b-41d4-a716-446655440000'));
        $this->assertFalse(str_is_uuid('not-a-uuid'));
        $this->assertFalse(str_is_uuid('550e8400-e29b-41d4-a716'));
    }

    public function testStrKebab()
    {
        $this->assertEquals('foo-bar', str_kebab('fooBar'));
        $this->assertEquals('foo-bar', str_kebab('FooBar'));
    }

    public function testStrSnake()
    {
        $this->assertEquals('foo_bar', str_snake('fooBar'));
        $this->assertEquals('foo_bar', str_snake('FooBar'));
    }

    public function testStrStudly()
    {
        $this->assertEquals('FooBar', str_studly('foo_bar'));
        $this->assertEquals('FooBar', str_studly('foo-bar'));
    }

    public function testStrPascal()
    {
        $this->assertEquals('FooBar', str_pascal('foo bar'));
        $this->assertEquals('FooBar', str_pascal('foo-bar'));
    }

    public function testStrCamel()
    {
        $this->assertEquals('fooBar', str_camel('foo bar'));
        $this->assertEquals('fooBar', str_camel('foo-bar'));
    }

    public function testStrLength()
    {
        $this->assertEquals(6, str_length('foobar'));
        $this->assertEquals(2, str_length('测试'));
    }

    public function testStrLimit()
    {
        $this->assertEquals('foo...', str_limit('foobar', 3));
        $this->assertEquals('foobar', str_limit('foobar', 10));
        $this->assertEquals('foo---', str_limit('foobar', 3, '---'));
    }

    public function testStrWords()
    {
        $this->assertEquals('foo bar...', str_words('foo bar baz', 2));
        $this->assertEquals('foo bar baz', str_words('foo bar baz', 10));
    }

    public function testStrLower()
    {
        $this->assertEquals('foobar', str_lower('FOOBAR'));
        $this->assertEquals('foobar', str_lower('FooBar'));
    }

    public function testStrUpper()
    {
        $this->assertEquals('FOOBAR', str_upper('foobar'));
        $this->assertEquals('FOOBAR', str_upper('FooBar'));
    }

    public function testStrTitle()
    {
        $this->assertEquals('Foo Bar', str_title('foo bar'));
    }

    public function testStrReplaceArray()
    {
        $this->assertEquals('foo bar baz', str_replace_array('?', ['foo', 'bar', 'baz'], '? ? ?'));
    }

    public function testStrReplaceFirst()
    {
        $this->assertEquals('barfoo', str_replace_first('foo', 'bar', 'foofoo'));
    }

    public function testStrReplaceLast()
    {
        $this->assertEquals('foobar', str_replace_last('foo', 'bar', 'foofoo'));
    }

    public function testStrRemove()
    {
        $this->assertEquals('foobar', str_remove('baz', 'foobarbaz'));
        $this->assertEquals('foobar', str_remove(['baz', 'qux'], 'foobarbazqux'));
    }

    public function testStrAscii()
    {
        $this->assertEquals('Cafe', str_ascii('Café'));
        $this->assertEquals('Mueller', str_ascii('Müller', 'de'));
    }

    public function testStrSlug()
    {
        $this->assertEquals('hello-world', str_slug('Hello World'));
        $this->assertEquals('hello_world', str_slug('Hello World', '_'));
    }

    public function testStrPlural()
    {
        $this->assertEquals('users', str_plural('user', 2));
        $this->assertEquals('user', str_plural('user', 1));
        $this->assertEquals('children', str_plural('child', 2));
    }

    public function testStrSingular()
    {
        $this->assertEquals('user', str_singular('users'));
        $this->assertEquals('child', str_singular('children'));
    }

    public function testStrUcfirst()
    {
        $this->assertEquals('Hello', str_ucfirst('hello'));
        $this->assertEquals('Hello world', str_ucfirst('hello world'));
    }

    public function testStrLcfirst()
    {
        $this->assertEquals('hello', str_lcfirst('Hello'));
        $this->assertEquals('hello World', str_lcfirst('Hello World'));
    }

    public function testStrMask()
    {
        // 'foobarbar' masked at index 2 with length 4: positions 2-5 = 'obar' -> 'fo****bar'
        $this->assertEquals('fo****bar', str_mask('foobarbar', '*', 2, 4));
        // Test with shorter length: positions 2-4 = 'oba' -> 'fo***rbar'
        $this->assertEquals('fo***rbar', str_mask('foobarbar', '*', 2, 3));
    }

    public function testStrExcerpt()
    {
        $text = 'This is a long text that contains the word test in the middle';
        $result = str_excerpt($text, 'test');
        $this->assertStringContainsString('test', $result);
    }

    public function testStrHeadline()
    {
        $this->assertEquals('Hello World', str_headline('hello world'));
    }

    public function testStrIsAscii()
    {
        $this->assertTrue(str_is_ascii('hello'));
        $this->assertFalse(str_is_ascii('测试'));
    }

    public function testStrIsJson()
    {
        $this->assertTrue(str_is_json('{"key":"value"}'));
        $this->assertTrue(str_is_json('[1,2,3]'));
        $this->assertFalse(str_is_json('not json'));
        $this->assertFalse(str_is_json(''));
    }

    public function testStrPassword()
    {
        $password = str_password(16);
        $this->assertEquals(16, strlen($password));
        $this->assertNotEquals(str_password(16), str_password(16));
    }

    public function testStrReverse()
    {
        $this->assertEquals('raboof', str_reverse('foobar'));
        $this->assertEquals('测试', str_reverse('试测'));
    }

    public function testStrSquish()
    {
        $this->assertEquals('foo bar baz', str_squish('  foo   bar   baz  '));
        $this->assertEquals('foo bar baz', str_squish("foo\t\tbar\n\nbaz"));
    }

    public function testStrSwap()
    {
        $this->assertEquals('bar foo', str_swap(['foo' => 'bar', 'bar' => 'foo'], 'foo bar'));
    }

    public function testStrWrap()
    {
        $this->assertEquals("foo\nbar", str_wrap('foo bar', 3));
    }

    public function testStrUuid4()
    {
        $uuid = str_uuid4();
        $this->assertMatchesRegularExpression('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i', $uuid);
    }
}

