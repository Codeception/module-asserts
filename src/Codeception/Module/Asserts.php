<?php

declare(strict_types=1);

namespace Codeception\Module;

/**
 * Special module for using asserts in your tests.
 */
class Asserts extends AbstractAsserts
{
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
     * @param \Throwable|string $throwable
     */
    public function expectThrowable($throwable, callable $callback): void
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
        } catch (\Throwable $t) {
            $this->checkThrowable($t, $class, $msg, $code);
            return;
        }

        $this->fail("Expected throwable of class '{$class}' to be thrown, but nothing was caught");
    }

    /**
     * Check if the given throwable matches the expected data,
     * fail (throws an exception) if it does not.
     */
    protected function checkThrowable(\Throwable $throwable, string $expectedClass, ?string $expectedMsg, $expectedCode = null): void
    {
        if (!($throwable instanceof $expectedClass)) {
            $this->fail(sprintf(
                "Exception of class '%s' expected to be thrown, but class '%s' was caught",
                $expectedClass,
                get_class($throwable)
            ));
        }

        if (null !== $expectedMsg && $throwable->getMessage() !== $expectedMsg) {
            $this->fail(sprintf(
                "Exception of class '%s' expected to have message '%s', but actual message was '%s'",
                $expectedClass,
                $expectedMsg,
                $throwable->getMessage()
            ));
        }

        if (null !== $expectedCode && $throwable->getCode() !== $expectedCode) {
            $this->fail(sprintf(
                "Exception of class '%s' expected to have code '%s', but actual code was '%s'",
                $expectedClass,
                $expectedCode,
                $throwable->getCode()
            ));
        }

        $this->assertTrue(true); // increment assertion counter
    }
}
