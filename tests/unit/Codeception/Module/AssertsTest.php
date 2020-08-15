<?php

namespace unit\Codeception\Module;

use Codeception\Lib\ModuleContainer;
use Codeception\Module\Asserts;
use Codeception\PHPUnit\TestCase;
use Codeception\Util\Stub;
use Exception;
use PHPUnit\Framework\AssertionFailedError;
use RuntimeException;
use stdClass;

class AssertsTest extends TestCase
{
    /** @var Asserts */
    protected $module;

    public function _setUp()
    {
        /** @var ModuleContainer $container */
        $container = Stub::make(ModuleContainer::class);
        $this->module = new Asserts($container);
    }

    public function testCodeceptionAsserts()
    {
        $this->module->assertFileNotExists(__FILE__ . '.notExist');
        // assertGreaterOrEquals
        // assertIsEmpty
        // assertLessOrEquals
        $this->module->assertNotRegExp('/^[a-z]$/', '1');
        $this->module->assertRegExp('/^[\d]$/', '1');
        // assertThatItsNot
    }

    public function testPHPUnitAsserts()
    {
        $this->module->assertArrayHasKey('one', ['one' => 1, 'two' => 2]);
        // assertArrayNotHasKey
        // assertClassHasAttribute
        // assertClassHasStaticAttribute
        // assertClassNotHasAttribute
        // assertClassNotHasStaticAttribute
        $this->module->assertContains(1, [1, 2]);
        // assertContainsEquals
        // assertContainsOnly
        // assertContainsOnlyInstancesOf
        $this->module->assertCount(3, [1, 2, 3]);
        // assertDirectoryDoesNotExist
        // assertDirectoryExists
        // assertDirectoryIsNotReadable
        // assertDirectoryIsNotWritable
        // assertDirectoryIsReadable
        // assertDirectoryIsWritable
        $this->module->assertDoesNotMatchRegularExpression('/^[a-z]$/', '1');
        $this->module->assertEmpty([]);
        $this->module->assertEquals(1, 1);
        $this->module->assertEqualsCanonicalizing([3, 2, 1], [1, 2, 3]);
        $this->module->assertEqualsIgnoringCase('foo', 'FOO');
        $this->module->assertEqualsWithDelta(1.0, 1.01, 0.1);
        $this->module->assertFalse(false);
        $this->module->assertFileDoesNotExist(__FILE__ . '.notExist');
        // assertFileEquals
        // assertFileEqualsCanonicalizing
        // assertFileEqualsIgnoringCase
        $this->module->assertFileExists(__FILE__);
        // assertFileIsNotReadable
        // assertFileIsNotWritable
        // assertFileIsReadable
        // assertFileIsWritable
        // assertFileNotEquals
        // assertFileNotEqualsCanonicalizing
        // assertFileNotEqualsIgnoringCase
        // assertFinite
        // assertGreaterThan
        // assertGreaterThanOrEqual
        // assertInfinite
        $this->module->assertInstanceOf('Exception', new Exception());
        $this->module->assertIsArray([1, 2, 3]);
        $this->module->assertIsBool(true);
        $this->module->assertIsCallable(function() {});
        // assertIsClosedResource
        $this->module->assertIsFloat(1.2);
        $this->module->assertIsInt(2);
        // assertIsIterable
        $this->module->assertIsNotArray(false);
        $this->module->assertIsNotBool([1, 2, 3]);
        $this->module->assertIsNotCallable('test');
        // assertIsNotClosedResource
        $this->module->assertIsNotFloat(false);
        $this->module->assertIsNotInt(false);
        // assertIsNotIterable
        $this->module->assertIsNotNumeric(false);
        $this->module->assertIsNotObject(false);
        // assertIsNotReadable
        $this->module->assertIsNotResource(false);
        $this->module->assertIsNotScalar(function() {});
        $this->module->assertIsNotString(false);
        // assertIsNotWritable
        $this->module->assertIsNumeric('12.34');
        $this->module->assertIsObject(new stdClass());
        // assertIsReadable
        $this->module->assertIsResource(fopen(__FILE__, 'r'));
        $this->module->assertIsScalar('test');
        $this->module->assertIsString('test');
        // assertIsWritable
        // assertJson
        // assertJsonFileEqualsJsonFile
        // assertJsonFileNotEqualsJsonFile
        // assertJsonStringEqualsJsonFile
        // assertJsonStringEqualsJsonString
        // assertJsonStringNotEqualsJsonFile
        // assertJsonStringNotEqualsJsonString
        // assertLessThan
        // assertLessThanOrEqual
        $this->module->assertMatchesRegularExpression('/^[\d]$/', '1');
        // assertNan
        // assertNotContains
        // assertNotContainsEquals
        // assertNotContainsOnly
        // assertNotCount
        $this->module->assertNotEmpty([1]);
        // assertNotEquals
        $this->module->assertNotEqualsCanonicalizing([3, 2, 1], [2, 3, 0, 1]);
        $this->module->assertNotEqualsIgnoringCase('foo', 'BAR');
        $this->module->assertNotEqualsWithDelta(1.0, 1.5, 0.1);
        $this->module->assertNotFalse(true);
        $this->module->assertNotFalse(null);
        $this->module->assertNotFalse('foo');
        // assertNotInstanceOf
        $this->module->assertNotNull('');
        $this->module->assertNotNull(false);
        $this->module->assertNotNull(0);
        $this->module->assertNotSame(1, '1');
        // assertNotSameSize
        $this->module->assertNotTrue(false);
        $this->module->assertNotTrue(null);
        $this->module->assertNotTrue('foo');
        $this->module->assertNull(null);
        // assertObjectHasAttribute
        // assertObjectNotHasAttribute
        $this->module->assertSame(1, 1);
        // assertSameSize
        $this->module->assertStringContainsString('bar', 'foobar');
        $this->module->assertStringContainsStringIgnoringCase('bar', 'FooBar');
        $this->module->assertStringEndsNotWith('fo', 'foo');
        $this->module->assertStringEndsWith('oo', 'foo');
        // assertStringEqualsFile
        // assertStringEqualsFileCanonicalizing
        // assertStringEqualsFileIgnoringCase
        // assertStringMatchesFormat
        // assertStringMatchesFormatFile
        $this->module->assertStringNotContainsString('baz', 'foobar');
        $this->module->assertStringNotContainsStringIgnoringCase('baz', 'FooBar');
        // assertStringNotEqualsFile
        // assertStringNotEqualsFileCanonicalizing
        // assertStringNotEqualsFileIgnoringCase
        // assertStringNotMatchesFormat
        // assertStringNotMatchesFormatFile
        $this->module->assertStringStartsNotWith('ba', 'foo');
        $this->module->assertStringStartsWith('fo', 'foo');
        // assertThat
        $this->module->assertTrue(true);
        // assertXmlFileEqualsXmlFile
        // assertXmlFileNotEqualsXmlFile
        // assertXmlStringEqualsXmlFile
        // assertXmlStringEqualsXmlString
        // assertXmlStringNotEqualsXmlFile
        // assertXmlStringNotEqualsXmlString
        // fail
        // markTestIncomplete
        // markTestSkipped
    }

    public function testExceptions()
    {
        $this->module->expectThrowable('Exception', function () {
            throw new Exception;
        });
        $this->module->expectThrowable(new Exception('here'), function () {
            throw new Exception('here');
        });
        $this->module->expectThrowable(new Exception('here', 200), function () {
            throw new Exception('here', 200);
        });
    }

    public function testExceptionFails()
    {
        $this->expectException(AssertionFailedError::class);

        $this->module->expectThrowable(new Exception('here', 200), function () {
            throw new Exception('here', 2);
        });
    }

    public function testOutputExceptionTimeWhenNothingCaught()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessageRegExp('/RuntimeException/');

        $this->module->expectThrowable(RuntimeException::class, function () {
        });
    }

    public function testExpectThrowable()
    {
        $this->module->expectThrowable('Exception', function () {
            throw new Exception();
        });
        $this->module->expectThrowable(new Exception('here'), function () {
            throw new Exception('here');
        });
        $this->module->expectThrowable(new Exception('here', 200), function () {
            throw new Exception('here', 200);
        });
    }

    public function testExpectThrowableFailOnDifferentClass()
    {
        $this->expectException(AssertionFailedError::class);

        $this->module->expectThrowable(new RuntimeException(), function () {
            throw new Exception();
        });
    }

    public function testExpectThrowableFailOnDifferentMessage()
    {
        $this->expectException(AssertionFailedError::class);

        $this->module->expectThrowable(new Exception('foo', 200), function () {
            throw new Exception('bar', 200);
        });
    }

    public function testExpectThrowableFailOnDifferentCode()
    {
        $this->expectException(AssertionFailedError::class);

        $this->module->expectThrowable(new Exception('foobar', 200), function () {
            throw new Exception('foobar', 2);
        });
    }

    public function testExpectThrowableFailOnNothingCaught()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessageRegExp('/RuntimeException/');

        $this->module->expectThrowable(RuntimeException::class, function () {
        });
    }
}
