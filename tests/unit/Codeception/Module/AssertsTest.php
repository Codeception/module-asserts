<?php

declare(strict_types=1);

namespace unit\Codeception\Module;

use Codeception\Lib\ModuleContainer;
use Codeception\Module\Asserts;
use Codeception\PHPUnit\TestCase;
use Codeception\Stub;
use Exception;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\IncompleteTestError;
use PHPUnit\Framework\SkippedTest;
use RuntimeException;
use stdClass;
use Support\Data\DummyClass;

final class AssertsTest extends TestCase
{
    private Asserts $module;

    protected function setUp(): void
    {
        require_once codecept_data_dir() . '/DummyClass.php';

        /** @var ModuleContainer $container */
        $container = Stub::make(ModuleContainer::class);
        $this->module = new Asserts($container);
    }

    public function testCodeceptionAsserts(): void
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

    public function testPHPUnitAsserts(): void
    {
        $dir = codecept_data_dir();
        $this->module->assertArrayHasKey('one', ['one' => 1, 'two' => 2]);
        $this->module->assertArrayNotHasKey('three', ['one' => 1, 'two' => 2]);
        $this->module->assertClassHasAttribute('foo', DummyClass::class);
        $this->module->assertClassHasStaticAttribute('staticFoo', DummyClass::class);
        $this->module->assertClassNotHasAttribute('bar', DummyClass::class);
        $this->module->assertClassNotHasStaticAttribute('staticBar', DummyClass::class);
        $this->module->assertContains(1, [1, 2]);
        $this->module->assertContainsEquals(2, [1, 2]);
        $this->module->assertContainsOnly(DummyClass::class, [new DummyClass(), new DummyClass()]);
        $this->module->assertContainsOnlyInstancesOf(DummyClass::class, [new DummyClass(), new DummyClass()]);
        $this->module->assertCount(3, [1, 2, 3]);
        $this->module->assertDirectoryDoesNotExist(__DIR__ . 'notExist');
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
        $this->module->assertFileEquals($dir . '/data1.txt', $dir . '/data1.txt');
        $this->module->assertFileEqualsCanonicalizing($dir . '/data1.txt', $dir . '/data1.txt');
        $this->module->assertFileEqualsIgnoringCase($dir . '/data1.txt', $dir . '/data2.txt');
        $this->module->assertFileExists(__FILE__);
        // assertFileIsNotReadable
        // assertFileIsNotWritable
        $this->module->assertFileIsReadable(__FILE__);
        $this->module->assertFileIsWritable(__FILE__);
        $this->module->assertFileNotEquals($dir . '/data1.json', $dir . '/data1.txt');
        $this->module->assertFileNotEqualsCanonicalizing($dir . '/data1.txt', $dir . '/data3.txt');
        $this->module->assertFileNotEqualsIgnoringCase($dir . '/data1.txt', $dir . '/data3.txt');
        $this->module->assertFinite(2);
        $this->module->assertGreaterThan(5, 6);
        $this->module->assertGreaterThanOrEqual(5, 5);
        $this->module->assertInfinite(1e308 * 2);
        $this->module->assertInstanceOf('Exception', new Exception());
        $this->module->assertIsArray([1, 2, 3]);
        $this->module->assertIsBool(true);
        $this->module->assertIsCallable(function () {
        });
        $closedResource = fopen('php://temp', 'r');
        Assert::assertNotFalse($closedResource);
        fclose($closedResource);
        $this->module->assertIsClosedResource($closedResource);
        $this->module->assertIsFloat(1.2);
        $this->module->assertIsInt(2);
        $this->module->assertIsIterable([]);
        $this->module->assertIsNotArray(false);
        $this->module->assertIsNotBool([1, 2, 3]);
        $this->module->assertIsNotCallable('test');
        $openendResource = fopen('php://temp', 'r');
        Assert::assertNotFalse($openendResource);
        $this->module->assertIsNotClosedResource($openendResource);
        $this->module->assertIsNotFloat(false);
        $this->module->assertIsNotInt(false);
        $this->module->assertIsNotIterable('test');
        $this->module->assertIsNotNumeric(false);
        $this->module->assertIsNotObject(false);
        $this->module->assertIsNotReadable(__FILE__ . '.notExist');
        $this->module->assertIsNotResource(false);
        $this->module->assertIsNotScalar(function () {
        });
        $this->module->assertIsNotString(false);
        $this->module->assertIsNotWritable(__FILE__ . '.notExist');
        $this->module->assertIsNumeric('12.34');
        $this->module->assertIsObject(new stdClass());
        $this->module->assertIsReadable(__FILE__);
        $this->module->assertIsResource(fopen(__FILE__, 'r'));
        $this->module->assertIsScalar('test');
        $this->module->assertIsString('test');
        $this->module->assertIsWritable(__FILE__);
        $this->module->assertJson('[]');
        $this->module->assertJsonFileEqualsJsonFile($dir . '/data1.json', $dir . '/data1.json');
        $this->module->assertJsonFileNotEqualsJsonFile($dir . '/data1.json', $dir . '/data2.json');
        $this->module->assertJsonStringEqualsJsonFile($dir . '/data1.json', '["foo", "bar"]');
        $this->module->assertJsonStringEqualsJsonString('["foo", "bar"]', '[ "foo" , "bar" ]');
        $this->module->assertJsonStringNotEqualsJsonFile($dir . '/data1.json', '["bar", "foo"]');
        $this->module->assertJsonStringNotEqualsJsonString('["foo", "bar"]', '["bar", "foo"]');
        $this->module->assertLessThan(4, 3);
        $this->module->assertLessThanOrEqual(3, 3);
        $this->module->assertMatchesRegularExpression('/^[\d]$/', '1');
        $this->module->assertNan(sqrt(-1));
        $this->module->assertNotContains('three', ['one', 'two']);
        $this->module->assertNotContainsOnly(DummyClass::class, [new DummyClass(), new Exception()]);
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
        $this->module->assertObjectHasAttribute('foo', new DummyClass());
        $this->module->assertObjectNotHasAttribute('bar', new DummyClass());
        $this->module->assertSame(1, 1);
        $this->module->assertSameSize([1, 2, 3], [1, 2, 3]);
        $this->module->assertStringContainsString('bar', 'foobar');
        $this->module->assertStringContainsStringIgnoringCase('bar', 'FooBar');
        $this->module->assertStringEndsNotWith('fo', 'foo');
        $this->module->assertStringEndsWith('oo', 'foo');
        $this->module->assertStringEqualsFile($dir . '/data1.txt', 'foo bar foo');
        $this->module->assertStringEqualsFileCanonicalizing($dir . '/data1.txt', 'foo bar foo');
        $this->module->assertStringEqualsFileIgnoringCase($dir . '/data1.txt', 'foo bAr foo');
        $this->module->assertStringMatchesFormat('*%s*', '***');
        $this->module->assertStringMatchesFormatFile($dir . '/expectedFileFormat.txt', "FOO\n");
        $this->module->assertStringNotContainsString('baz', 'foobar');
        $this->module->assertStringNotContainsStringIgnoringCase('baz', 'FooBar');
        $this->module->assertStringNotEqualsFile($dir . '/data2.txt', 'foo bar foo');
        $this->module->assertStringNotEqualsFileCanonicalizing($dir . '/data3.txt', 'foo bar foo');
        $this->module->assertStringNotEqualsFileIgnoringCase($dir . '/data3.txt', 'foo bar foo');
        $this->module->assertStringNotMatchesFormat('*%s*', '**');
        $this->module->assertStringNotMatchesFormatFile($dir . '/expectedFileFormat.txt', "FO");
        $this->module->assertStringStartsNotWith('ba', 'foo');
        $this->module->assertStringStartsWith('fo', 'foo');
        $this->module->assertThat(4, new IsEqual(4));
        $this->module->assertTrue(true);
        $this->module->assertXmlFileEqualsXmlFile($dir . '/data1.xml', $dir . '/data1.xml');
        $this->module->assertXmlFileNotEqualsXmlFile($dir . '/data1.xml', $dir . '/data2.xml');
        $this->module->assertXmlStringEqualsXmlFile($dir . '/data1.xml', ' <foo>foo</foo> ');
        $this->module->assertXmlStringEqualsXmlString('<foo>foo</foo>', ' <foo>foo</foo> ');
        $this->module->assertXmlStringNotEqualsXmlFile($dir . '/data1.xml', '<foo>bar</foo>');
        $this->module->assertXmlStringNotEqualsXmlString('<foo>foo</foo>', '<foo>bar</foo>');
    }

    public function testExceptions(): void
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

    public function testExceptionFails(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->module->expectThrowable(new Exception('here', 200), function () {
            throw new Exception('here', 2);
        });
    }

    public function testOutputExceptionTimeWhenNothingCaught(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessageRegExp('/RuntimeException/');

        $this->module->expectThrowable(RuntimeException::class, function () {
        });
    }

    public function testExpectThrowable(): void
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

    public function testExpectThrowableFailOnDifferentClass(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->module->expectThrowable(new RuntimeException(), function () {
            throw new Exception();
        });
    }

    public function testExpectThrowableFailOnDifferentMessage(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->module->expectThrowable(new Exception('foo', 200), function () {
            throw new Exception('bar', 200);
        });
    }

    public function testExpectThrowableFailOnDifferentCode(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->module->expectThrowable(new Exception('foobar', 200), function () {
            throw new Exception('foobar', 2);
        });
    }

    public function testExpectThrowableFailOnNothingCaught(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessageRegExp('/RuntimeException/');

        $this->module->expectThrowable(RuntimeException::class, function () {
        });
    }

    public function testFail(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('foobar');

        $this->module->fail('foobar');
    }

    public function testMarkTestIncomplete(): void
    {
        $this->expectException(IncompleteTestError::class);
        $this->expectExceptionMessage('foobar');

        $this->module->markTestIncomplete('foobar');
    }

    public function testMarkTestSkipped(): void
    {
        $this->expectExceptionMessage('foobar');
        $this->expectException(SkippedTest::class);
        $this->module->markTestSkipped('foobar');
    }
}
