<?php

declare(strict_types=1);

namespace unit\Codeception\Module;

use ArrayObject;
use Codeception\Lib\ModuleContainer;
use Codeception\Module\Asserts;
use Codeception\PHPUnit\TestCase;
use Codeception\Stub;
use Exception;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\IncompleteTestError;
use PHPUnit\Framework\SkippedTestError;
use PHPUnit\Framework\SkippedWithMessageException;
use PHPUnit\Runner\Version as PHPUnitVersion;
use RuntimeException;
use stdClass;

final class AssertsTest extends TestCase
{
    protected ?Asserts $module = null;

    public function _setUp()
    {
        require_once codecept_data_dir().'/DummyClass.php';

        /** @var ModuleContainer $container */
        $container = Stub::make(ModuleContainer::class);
        $this->module = new Asserts($container);
    }

    public function testCodeceptionAsserts()
    {
        $this->module->assertFileNotExists(__FILE__ . '.notExist');
        $this->module->assertGreaterOrEquals(2, 2);
        $this->module->assertGreaterOrEquals(2, 3);
        $this->module->assertIsEmpty([]);
        $this->module->assertLessOrEquals(2, 1);
        $this->module->assertLessOrEquals(2, 2);
        $this->module->assertNotRegExp('/^[a-z]$/', '1');
        $this->module->assertRegExp('/^[\d]$/', '1');
        $this->module->assertThatItsNot(3, new IsEqual(4));
    }

    public function testPHPUnitAsserts()
    {
        $closedResource = fopen(__FILE__, 'r');
        fclose($closedResource);

        $openendResource = fopen(__FILE__, 'r');

        $this->module->assertArrayHasKey('one', ['one' => 1, 'two' => 2]);
        $this->module->assertArrayNotHasKey('three', ['one' => 1, 'two' => 2]);
        $this->module->assertClassHasAttribute('foo', \Support\Data\DummyClass::class);
        $this->module->assertClassHasStaticAttribute('staticFoo', \Support\Data\DummyClass::class);
        $this->module->assertClassNotHasAttribute('bar', \Support\Data\DummyClass::class);
        $this->module->assertClassNotHasStaticAttribute('staticBar', \Support\Data\DummyClass::class);
        $this->module->assertContains(1, [1, 2]);
        $this->module->assertContainsEquals(2, [1, 2]);
        $this->module->assertContainsNotOnlyArray([['foo'], 'foo', ['bar']]);
        $this->module->assertContainsNotOnlyBool([true, false, true, 42]);
        $this->module->assertContainsNotOnlyCallable([fn() => 'foo', 'bar', fn() => 'bar']);
        $this->module->assertContainsNotOnlyClosedResource([$closedResource, $openendResource]);
        $this->module->assertContainsNotOnlyFloat([1.1, 1.42, 5]);
        $this->module->assertContainsNotOnlyInstancesOf(\Support\Data\DummyClass::class, [new \Support\Data\DummyClass(), new stdClass(), new \Support\Data\DummyClass()]);
        $this->module->assertContainsNotOnlyInt([1, 42, 42.1]);
        $this->module->assertContainsNotOnlyIterable([['foo'], 'bar', [new ArrayObject(['foo'])]]);
        $this->module->assertContainsNotOnlyNull([null, 42]);
        $this->module->assertContainsNotOnlyNumeric(['foo', 42]);
        $this->module->assertContainsNotOnlyObject([new stdClass(), []]);
        $this->module->assertContainsNotOnlyResource([$openendResource, $closedResource, 'foo']);
        $this->module->assertContainsNotOnlyScalar([1, new stdClass()]);
        $this->module->assertContainsNotOnlyString(['foo', 42, 'bar']);
        $this->module->assertContainsOnly(\Support\Data\DummyClass::class, [new \Support\Data\DummyClass(), new \Support\Data\DummyClass()]);
        $this->module->assertContainsOnly('integer', [5, 6]);
        $this->module->assertContainsOnlyArray([['foo'], ['bar']]);
        $this->module->assertContainsOnlyBool([true, false, true]);
        $this->module->assertContainsOnlyCallable([fn() => 'foo', fn() => 'bar']);
        $this->module->assertContainsOnlyClosedResource([$closedResource]);
        $this->module->assertContainsOnlyFloat([1.1, 1.42]);
        $this->module->assertContainsOnlyInstancesOf(\Support\Data\DummyClass::class, [new \Support\Data\DummyClass(), new \Support\Data\DummyClass()]);
        $this->module->assertContainsOnlyInt([1, 42]);
        $this->module->assertContainsOnlyIterable([['foo'], [new ArrayObject(['foo'])]]);
        $this->module->assertContainsOnlyNull([null, null]);
        $this->module->assertContainsOnlyNumeric(['42.5', 42]);
        $this->module->assertContainsOnlyObject([new stdClass(), new ArrayObject(['bar'])]);
        $this->module->assertContainsOnlyResource([$openendResource, $closedResource]);
        $this->module->assertContainsOnlyScalar([1, 'foo']);
        $this->module->assertContainsOnlyString(['foo', 'bar']);
        $this->module->assertCount(3, [1, 2, 3]);
        $this->module->assertDirectoryDoesNotExist(__DIR__.'notExist');
        $this->module->assertDirectoryExists(__DIR__);
        // assertDirectoryIsNotReadable
        // assertDirectoryIsNotWritable
        $this->module->assertDirectoryIsReadable(__DIR__);
        $this->module->assertDirectoryIsWritable(__DIR__);
        $this->module->assertDoesNotMatchRegularExpression('/^[a-z]$/', '1');
        $this->module->assertEmpty([]);
        $this->module->assertEmpty(0);
        $this->module->assertEquals(1, 1);
        $this->module->assertEqualsCanonicalizing([3, 2, 1], [1, 2, 3]);
        $this->module->assertEqualsIgnoringCase('foo', 'FOO');
        $this->module->assertEqualsWithDelta(1.0, 1.01, 0.1);
        $this->module->assertFalse(false);
        $this->module->assertFileDoesNotExist(__FILE__ . '.notExist');
        $this->module->assertFileEquals(codecept_data_dir().'/data1.txt', codecept_data_dir().'/data1.txt');
        $this->module->assertFileEqualsCanonicalizing(codecept_data_dir().'/data1.txt', codecept_data_dir().'/data1.txt');
        $this->module->assertFileEqualsIgnoringCase(codecept_data_dir().'/data1.txt', codecept_data_dir().'/data2.txt');
        $this->module->assertFileExists(__FILE__);
        // assertFileIsNotReadable
        // assertFileIsNotWritable
        $this->module->assertFileIsReadable(__FILE__);
        $this->module->assertFileIsWritable(__FILE__);
        $this->module->assertFileNotEquals(codecept_data_dir().'/data1.json', codecept_data_dir().'/data1.txt');
        $this->module->assertFileNotEqualsCanonicalizing(codecept_data_dir().'/data1.txt', codecept_data_dir().'/data3.txt');
        $this->module->assertFileNotEqualsIgnoringCase(codecept_data_dir().'/data1.txt', codecept_data_dir().'/data3.txt');
        $this->module->assertFinite(2);
        $this->module->assertGreaterThan(5, 6);
        $this->module->assertGreaterThanOrEqual(5, 5);
        $this->module->assertInfinite(1e308 * 2);
        $this->module->assertInstanceOf('Exception', new Exception());
        $this->module->assertIsArray([1, 2, 3]);
        $this->module->assertIsBool(true);
        $this->module->assertIsCallable(function() {});
        $this->module->assertIsClosedResource($closedResource);
        $this->module->assertIsFloat(1.2);
        $this->module->assertIsInt(2);
        $this->module->assertIsIterable([]);
        $this->module->assertIsNotArray(false);
        $this->module->assertIsNotBool([1, 2, 3]);
        $this->module->assertIsNotCallable('test');
        $this->module->assertIsNotClosedResource($openendResource);
        $this->module->assertIsNotFloat(false);
        $this->module->assertIsNotInt(false);
        $this->module->assertIsNotIterable('test');
        $this->module->assertIsNotNumeric(false);
        $this->module->assertIsNotObject(false);
        $this->module->assertIsNotReadable(__FILE__.'.notExist');
        $this->module->assertIsNotResource(false);
        $this->module->assertIsNotScalar(function() {});
        $this->module->assertIsNotString(false);
        $this->module->assertIsNotWritable(__FILE__.'.notExist');
        $this->module->assertIsNumeric('12.34');
        $this->module->assertIsObject(new stdClass());
        $this->module->assertIsReadable(__FILE__);
        $this->module->assertIsResource(fopen(__FILE__, 'r'));
        $this->module->assertIsScalar('test');
        $this->module->assertIsString('test');
        $this->module->assertIsWritable(__FILE__);
        $this->module->assertJson('[]');
        $this->module->assertJsonFileEqualsJsonFile(codecept_data_dir().'/data1.json', codecept_data_dir().'/data1.json');
        $this->module->assertJsonFileNotEqualsJsonFile(codecept_data_dir().'/data1.json', codecept_data_dir().'/data2.json');
        $this->module->assertJsonStringEqualsJsonFile(codecept_data_dir().'/data1.json', '["foo", "bar"]');
        $this->module->assertJsonStringEqualsJsonString('["foo", "bar"]', '[ "foo" , "bar" ]');
        $this->module->assertJsonStringNotEqualsJsonFile(codecept_data_dir().'/data1.json', '["bar", "foo"]');
        $this->module->assertJsonStringNotEqualsJsonString('["foo", "bar"]', '["bar", "foo"]');
        $this->module->assertLessThan(4, 3);
        $this->module->assertLessThanOrEqual(3, 3);
        $this->module->assertMatchesRegularExpression('/^[\d]$/', '1');
        $this->module->assertNan(sqrt(-1));
        $this->module->assertNotContains('three', ['one', 'two']);
        $this->module->assertNotContainsEquals(3, [1, 2]);
        $this->module->assertNotContainsOnly(\Support\Data\DummyClass::class, [new \Support\Data\DummyClass(), new Exception()]);
        $this->module->assertNotContainsOnly('integer', [1, 42, 42.1]);
        $this->module->assertNotCount(1, ['one', 'two']);
        $this->module->assertNotEmpty([1]);
        $this->module->assertNotEquals(true, false);
        $this->module->assertNotEqualsCanonicalizing([3, 2, 1], [2, 3, 0, 1]);
        $this->module->assertNotEqualsIgnoringCase('foo', 'BAR');
        $this->module->assertNotEqualsWithDelta(1.0, 1.5, 0.1);
        $this->module->assertNotFalse(true);
        $this->module->assertNotFalse(null);
        $this->module->assertNotFalse('foo');
        $this->module->assertNotInstanceOf(RuntimeException::class, new Exception());
        $this->module->assertNotNull('');
        $this->module->assertNotNull(false);
        $this->module->assertNotNull(0);
        $this->module->assertNotSame(1, '1');
        $this->module->assertNotSameSize([1, 2, 3], [1, 1, 2, 3]);
        $this->module->assertNotTrue(false);
        $this->module->assertNotTrue(null);
        $this->module->assertNotTrue('foo');
        $this->module->assertNull(null);
        $this->module->assertObjectHasAttribute('foo', new \Support\Data\DummyClass());
        $this->module->assertObjectNotHasAttribute('bar', new \Support\Data\DummyClass());
        $this->module->assertSame(1, 1);
        $this->module->assertSameSize([1, 2, 3], [1, 2, 3]);
        $this->module->assertStringContainsString('bar', 'foobar');
        $this->module->assertStringContainsStringIgnoringCase('bar', 'FooBar');
        $this->module->assertStringEndsNotWith('fo', 'foo');
        $this->module->assertStringEndsWith('oo', 'foo');
        $this->module->assertStringEqualsFile(codecept_data_dir().'/data1.txt', 'foo bar foo');
        $this->module->assertStringEqualsFileCanonicalizing(codecept_data_dir().'/data1.txt', 'foo bar foo');
        $this->module->assertStringEqualsFileIgnoringCase(codecept_data_dir().'/data1.txt', 'foo bAr foo');
        $this->module->assertStringMatchesFormat('*%s*', '***');
        $this->module->assertStringMatchesFormatFile(codecept_data_dir().'/expectedFileFormat.txt', "FOO\n");
        $this->module->assertStringNotContainsString('baz', 'foobar');
        $this->module->assertStringNotContainsStringIgnoringCase('baz', 'FooBar');
        $this->module->assertStringNotEqualsFile(codecept_data_dir().'/data2.txt', 'foo bar foo');
        $this->module->assertStringNotEqualsFileCanonicalizing(codecept_data_dir().'/data3.txt', 'foo bar foo');
        $this->module->assertStringNotEqualsFileIgnoringCase(codecept_data_dir().'/data3.txt', 'foo bar foo');
        $this->module->assertStringNotMatchesFormat('*%s*', '**');
        $this->module->assertStringNotMatchesFormatFile(codecept_data_dir().'/expectedFileFormat.txt', "FO");
        $this->module->assertStringStartsNotWith('ba', 'foo');
        $this->module->assertStringStartsWith('fo', 'foo');
        $this->module->assertThat(4, new IsEqual(4));
        $this->module->assertTrue(true);
        $this->module->assertXmlFileEqualsXmlFile(codecept_data_dir().'/data1.xml', codecept_data_dir().'/data1.xml');
        $this->module->assertXmlFileNotEqualsXmlFile(codecept_data_dir().'/data1.xml', codecept_data_dir().'/data2.xml');
        $this->module->assertXmlStringEqualsXmlFile(codecept_data_dir().'/data1.xml', ' <foo>foo</foo> ');
        $this->module->assertXmlStringEqualsXmlString('<foo>foo</foo>', ' <foo>foo</foo> ');
        $this->module->assertXmlStringNotEqualsXmlFile(codecept_data_dir().'/data1.xml', '<foo>bar</foo>');
        $this->module->assertXmlStringNotEqualsXmlString('<foo>foo</foo>', '<foo>bar</foo>');
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

    public function testFail()
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('foobar');

        $this->module->fail('foobar');
    }

    public function testMarkTestIncomplete()
    {
        $this->expectException(IncompleteTestError::class);
        $this->expectExceptionMessage('foobar');

        $this->module->markTestIncomplete('foobar');
    }

    public function testMarkTestSkipped()
    {
        $this->expectExceptionMessage('foobar');
        if (PHPUnitVersion::series() < 10) {
            $this->expectException(SkippedTestError::class);
        } else {
            $this->expectException(SkippedWithMessageException::class);
        }

        $this->module->markTestSkipped('foobar');
    }
}
