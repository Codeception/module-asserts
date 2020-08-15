<?php

namespace Codeception\Module;

use Codeception\Lib\Notification;
use Codeception\Module as CodeceptionModule;
use Codeception\Util\Shared\Asserts as SharedAsserts;
use Exception;
use Throwable;

/**
 * Special module for using asserts in your tests.
 */
class Asserts extends CodeceptionModule
{
    use SharedAsserts {
        assertArrayHasKey as public;
        assertArrayNotHasKey as public;
        assertClassHasAttribute as public;
        assertClassHasStaticAttribute as public;
        assertClassNotHasAttribute as public;
        assertClassNotHasStaticAttribute as public;
        assertContains as public;
        assertContainsEquals as public;
        assertContainsOnly as public;
        assertContainsOnlyInstancesOf as public;
        assertCount as public;
        assertDirectoryDoesNotExist as public;
        assertDirectoryExists as public;
        assertDirectoryIsNotReadable as public;
        assertDirectoryIsNotWritable as public;
        assertDirectoryIsReadable as public;
        assertDirectoryIsWritable as public;
        assertDoesNotMatchRegularExpression as public;
        assertEmpty as public;
        assertEquals as public;
        assertEqualsCanonicalizing as public;
        assertEqualsIgnoringCase as public;
        assertEqualsWithDelta as public;
        assertFalse as public;
        assertFileDoesNotExist as public;
        assertFileEquals as public;
        assertFileEqualsCanonicalizing as public;
        assertFileEqualsIgnoringCase as public;
        assertFileExists as public;
        assertFileIsNotReadable as public;
        assertFileIsNotWritable as public;
        assertFileIsReadable as public;
        assertFileIsWritable as public;
        assertFileNotEquals as public;
        assertFileNotEqualsCanonicalizing as public;
        assertFileNotEqualsIgnoringCase as public;
        assertFileNotExists as public;
        assertFinite as public;
        assertGreaterOrEquals as public;
        assertGreaterThan as public;
        assertGreaterThanOrEqual as public;
        assertInfinite as public;
        assertInstanceOf as public;
        assertIsArray as public;
        assertIsBool as public;
        assertIsCallable as public;
        assertIsClosedResource as public;
        assertIsEmpty as public;
        assertIsFloat as public;
        assertIsInt as public;
        assertIsIterable as public;
        assertIsNotArray as public;
        assertIsNotBool as public;
        assertIsNotCallable as public;
        assertIsNotClosedResource as public;
        assertIsNotFloat as public;
        assertIsNotInt as public;
        assertIsNotIterable as public;
        assertIsNotNumeric as public;
        assertIsNotObject as public;
        assertIsNotReadable as public;
        assertIsNotResource as public;
        assertIsNotScalar as public;
        assertIsNotString as public;
        assertIsNotWritable as public;
        assertIsNumeric as public;
        assertIsObject as public;
        assertIsReadable as public;
        assertIsResource as public;
        assertIsScalar as public;
        assertIsString as public;
        assertIsWritable as public;
        assertJson as public;
        assertJsonFileEqualsJsonFile as public;
        assertJsonFileNotEqualsJsonFile as public;
        assertJsonStringEqualsJsonFile as public;
        assertJsonStringEqualsJsonString as public;
        assertJsonStringNotEqualsJsonFile as public;
        assertJsonStringNotEqualsJsonString as public;
        assertLessOrEquals as public;
        assertLessThan as public;
        assertLessThanOrEqual as public;
        assertMatchesRegularExpression as public;
        assertNan as public;
        assertNotContains as public;
        assertNotContainsEquals as public;
        assertNotContainsOnly as public;
        assertNotCount as public;
        assertNotEmpty as public;
        assertNotEquals as public;
        assertNotEqualsCanonicalizing as public;
        assertNotEqualsIgnoringCase as public;
        assertNotEqualsWithDelta as public;
        assertNotFalse as public;
        assertNotInstanceOf as public;
        assertNotNull as public;
        assertNotRegExp as public;
        assertNotSame as public;
        assertNotSameSize as public;
        assertNotTrue as public;
        assertNull as public;
        assertObjectHasAttribute as public;
        assertObjectNotHasAttribute as public;
        assertRegExp as public;
        assertSame as public;
        assertSameSize as public;
        assertStringContainsString as public;
        assertStringContainsStringIgnoringCase as public;
        assertStringEndsNotWith as public;
        assertStringEndsWith as public;
        assertStringEqualsFile as public;
        assertStringEqualsFileCanonicalizing as public;
        assertStringEqualsFileIgnoringCase as public;
        assertStringMatchesFormat as public;
        assertStringMatchesFormatFile as public;
        assertStringNotContainsString as public;
        assertStringNotContainsStringIgnoringCase as public;
        assertStringNotEqualsFile as public;
        assertStringNotEqualsFileCanonicalizing as public;
        assertStringNotEqualsFileIgnoringCase as public;
        assertStringNotMatchesFormat as public;
        assertStringNotMatchesFormatFile as public;
        assertStringStartsNotWith as public;
        assertStringStartsWith as public;
        assertThat as public;
        assertThatItsNot as public;
        assertTrue as public;
        assertXmlFileEqualsXmlFile as public;
        assertXmlFileNotEqualsXmlFile as public;
        assertXmlStringEqualsXmlFile as public;
        assertXmlStringEqualsXmlString as public;
        assertXmlStringNotEqualsXmlFile as public;
        assertXmlStringNotEqualsXmlString as public;
        fail as public;
        markTestIncomplete as public;
        markTestSkipped as public;
    }

    /**
     * Handles and checks exception called inside callback function.
     * Either exception class name or exception instance should be provided.
     *
     * ```php
     * <?php
     * $I->expectException(MyException::class, function() {
     *     $this->doSomethingBad();
     * });
     *
     * $I->expectException(new MyException(), function() {
     *     $this->doSomethingBad();
     * });
     * ```
     * If you want to check message or exception code, you can pass them with exception instance:
     * ```php
     * <?php
     * // will check that exception MyException is thrown with "Don't do bad things" message
     * $I->expectException(new MyException("Don't do bad things"), function() {
     *     $this->doSomethingBad();
     * });
     * ```
     *
     * @deprecated Use expectThrowable() instead
     * @param Exception|string $exception
     * @param callable $callback
     */
    public function expectException($exception, $callback)
    {
        Notification::deprecate('Use expectThrowable() instead');
        $this->expectThrowable($exception, $callback);
    }

    /**
     * Handles and checks throwables (Exceptions/Errors) called inside the callback function.
     * Either throwable class name or throwable instance should be provided.
     *
     * ```php
     * <?php
     * $I->expectThrowable(MyThrowable::class, function() {
     *     $this->doSomethingBad();
     * });
     *
     * $I->expectThrowable(new MyException(), function() {
     *     $this->doSomethingBad();
     * });
     * ```
     * If you want to check message or throwable code, you can pass them with throwable instance:
     * ```php
     * <?php
     * // will check that throwable MyError is thrown with "Don't do bad things" message
     * $I->expectThrowable(new MyError("Don't do bad things"), function() {
     *     $this->doSomethingBad();
     * });
     * ```
     *
     * @param Throwable|string $throwable
     * @param callable $callback
     */
    public function expectThrowable($throwable, $callback)
    {
        if (is_object($throwable)) {
            $class = get_class($throwable);
            $msg = $throwable->getMessage();
            $code = $throwable->getCode();
        } else {
            $class = $throwable;
            $msg = null;
            $code = null;
        }

        try {
            $callback();
        } catch (Exception $t) {
            $this->checkThrowable($t, $class, $msg, $code);
            return;
        } catch (Throwable $t) {
            $this->checkThrowable($t, $class, $msg, $code);
            return;
        }

        $this->fail("Expected throwable of class '$class' to be thrown, but nothing was caught");
    }

    /**
     * Check if the given throwable matches the expected data,
     * fail (throws an exception) if it does not.
     *
     * @param Throwable $throwable
     * @param string $expectedClass
     * @param string $expectedMsg
     * @param int $expectedCode
     */
    protected function checkThrowable($throwable, $expectedClass, $expectedMsg, $expectedCode)
    {
        if (!($throwable instanceof $expectedClass)) {
            $this->fail(sprintf(
                "Exception of class '$expectedClass' expected to be thrown, but class '%s' was caught",
                get_class($throwable)
            ));
        }

        if (null !== $expectedMsg && $throwable->getMessage() !== $expectedMsg) {
            $this->fail(sprintf(
                "Exception of class '$expectedClass' expected to have message '$expectedMsg', but actual message was '%s'",
                $throwable->getMessage()
            ));
        }

        if (null !== $expectedCode && $throwable->getCode() !== $expectedCode) {
            $this->fail(sprintf(
                "Exception of class '$expectedClass' expected to have code '$expectedCode', but actual code was '%s'",
                $throwable->getCode()
            ));
        }

        $this->assertTrue(true); // increment assertion counter
    }
}
