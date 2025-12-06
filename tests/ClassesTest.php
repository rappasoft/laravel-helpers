<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

// Test classes for testing
class TestClass
{
}

trait TestTrait
{
}

class ClassesTest extends TestCase
{
    public function testClassBasename()
    {
        $this->assertEquals('TestClass', class_basename(TestClass::class));
        $this->assertEquals('stdClass', class_basename(new \stdClass()));
        $this->assertEquals('ClassesTest', class_basename($this));
    }

    public function testClassUsesRecursive()
    {
        $traits = class_uses_recursive(TestClass::class);
        $this->assertIsArray($traits);
    }

    public function testTraitUsesRecursive()
    {
        $traits = trait_uses_recursive(TestTrait::class);
        $this->assertIsArray($traits);
    }
}

