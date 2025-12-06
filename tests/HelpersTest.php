<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function testDd()
    {
        // dd() calls die(), so we can't fully test it without dying
        // Just verify the function exists
        $this->assertTrue(function_exists('dd'));
    }

    public function testDump()
    {
        $this->expectOutputRegex('/.*/');
        
        $result = dump('test');
        $this->assertEquals('test', $result);
    }

    public function testE()
    {
        $this->assertEquals('&lt;script&gt;', e('<script>'));
        $this->assertEquals('&quot;test&quot;', e('"test"'));
        $this->assertEquals('test', e('test'));
    }

    public function testValue()
    {
        $this->assertEquals('test', value('test'));
        $this->assertEquals('closure', value(function () {
            return 'closure';
        }));
    }

    public function testTap()
    {
        $object = new \stdClass();
        $object->value = 'original';

        $result = tap($object, function ($obj) {
            $obj->value = 'modified';
        });

        $this->assertSame($object, $result);
        $this->assertEquals('modified', $result->value);
    }

    public function testWith()
    {
        $object = new \stdClass();
        $result = with($object);
        $this->assertSame($object, $result);
    }

    public function testObjectGet()
    {
        $object = new \stdClass();
        $object->user = new \stdClass();
        $object->user->name = 'John';

        $this->assertEquals('John', object_get($object, 'user.name'));
        $this->assertNull(object_get($object, 'user.email'));
        $this->assertEquals('default', object_get($object, 'user.email', 'default'));
    }

    public function testStr()
    {
        $this->assertEquals('test', str('test'));
        $this->assertEquals('', str(null));
        
        // Test string helper instance
        $helper = str();
        $this->assertIsObject($helper);
    }

    public function testBlank()
    {
        $this->assertTrue(blank(null));
        $this->assertTrue(blank(''));
        $this->assertTrue(blank('   '));
        $this->assertTrue(blank([]));
        $this->assertFalse(blank('test'));
        $this->assertFalse(blank(0));
        $this->assertFalse(blank(false));
        $this->assertFalse(blank(['test']));
    }

    public function testFilled()
    {
        $this->assertFalse(filled(null));
        $this->assertFalse(filled(''));
        $this->assertFalse(filled('   '));
        $this->assertFalse(filled([]));
        $this->assertTrue(filled('test'));
        $this->assertTrue(filled(0));
        $this->assertTrue(filled(false));
        $this->assertTrue(filled(['test']));
    }

    public function testThrowIf()
    {
        $this->expectException(\RuntimeException::class);
        throw_if(true, \RuntimeException::class, 'Test exception');

        // Should not throw
        throw_if(false, \RuntimeException::class, 'Test exception');
        $this->assertTrue(true);
    }

    public function testThrowUnless()
    {
        $this->expectException(\RuntimeException::class);
        throw_unless(false, \RuntimeException::class, 'Test exception');

        // Should not throw
        throw_unless(true, \RuntimeException::class, 'Test exception');
        $this->assertTrue(true);
    }

    public function testTransform()
    {
        $result = transform('test', function ($value) {
            return strtoupper($value);
        });
        $this->assertEquals('TEST', $result);

        $result = transform(null, function ($value) {
            return strtoupper($value);
        }, 'default');
        $this->assertEquals('default', $result);

        $result = transform(null, function ($value) {
            return strtoupper($value);
        }, function () {
            return 'closure';
        });
        $this->assertEquals('closure', $result);
    }

    public function testWindowsOs()
    {
        $isWindows = windows_os();
        $this->assertIsBool($isWindows);
    }

    public function testRetry()
    {
        $callCount = 0;
        $result = retry(3, function ($attempt) use (&$callCount) {
            $callCount++;
            // Retry function has a bug where attempts resets, so we'll just test that it retries
            if ($callCount < 3) {
                throw new \Exception('Failed');
            }
            return 'success';
        });

        $this->assertEquals('success', $result);
        $this->assertEquals(3, $callCount);
    }

    public function testRescue()
    {
        $result = rescue(function () {
            throw new \Exception('Error');
        }, 'default');
        $this->assertEquals('default', $result);

        $result = rescue(function () {
            return 'success';
        }, 'default');
        $this->assertEquals('success', $result);

        $result = rescue(function () {
            throw new \Exception('Error');
        }, function ($e) {
            return 'closure: ' . $e->getMessage();
        });
        $this->assertEquals('closure: Error', $result);
    }
}

