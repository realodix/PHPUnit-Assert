<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PUVersion;

trait ComparisonTrait
{
    public function equals($expected, string $message = ''): self
    {
        PHPUnit::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    public function equalsCanonicalizing($expected, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertEquals($expected, $this->actual, $message, 0.0, 10, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function equalsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertEquals($expected, $this->actual, $message, 0.0, 10, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function equalsWithDelta($expected, float $delta, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertEquals($expected, $this->actual, $message, $delta);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function greaterThan($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThan($expected, $this->actual, $message);

        return $this;
    }

    public function greaterThanOrEqual($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    public function lessThan($expected, string $message = ''): self
    {
        PHPUnit::assertLessThan($expected, $this->actual, $message);

        return $this;
    }

    public function lessThanOrEqual($expected, string $message = ''): self
    {
        PHPUnit::assertLessThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    public function notEquals($expected, string $message = ''): self
    {
        PHPUnit::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsCanonicalizing($expected, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotEquals($expected, $this->actual, $message, 0.0, 10, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotEquals($expected, $this->actual, $message, 0.0, 10, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsWithDelta($expected, float $delta, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotEquals($expected, $this->actual, $message, $delta);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function notSame($expected, string $message = ''): self
    {
        PHPUnit::assertNotSame($expected, $this->actual, $message);

        return $this;
    }

    public function same($expected, string $message = ''): self
    {
        PHPUnit::assertSame($expected, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing($expectedFile, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing($expectedFile, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }
}
