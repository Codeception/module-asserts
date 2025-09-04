<?php

declare(strict_types=1);

namespace Support\Data;

class DummyClass
{
    /**
     * @phpstan-ignore-next-line
     */
    private int $foo;

    /**
     * @phpstan-ignore-next-line
     */
    private static int $staticFoo;
}
