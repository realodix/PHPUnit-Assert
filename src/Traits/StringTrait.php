<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PUVersion;

trait StringTrait
{
    public function doesNotMatchRegularExpression($pattern, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    public function matchesRegularExpression($pattern, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    public function stringContainsString($needle, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if ($needle === '') {
                PHPUnit::assertSame($needle, $needle, $message);

                return $this;
            }

            PHPUnit::assertContains($needle, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringContainsStringIgnoringCase($needle, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if ($needle === '') {
                PHPUnit::assertSame($needle, $needle, $message);

                return $this;
            }

            PHPUnit::assertContains($needle, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringEndsNotWith($suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsNotWith($suffix, $this->actual, $message);

        return $this;
    }

    public function stringEndsWith($suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsWith($suffix, $this->actual, $message);

        return $this;
    }

    public function stringMatchesFormat($format, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringMatchesFormatFile($formatFile, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsString($needle, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if ($needle === '') {
                if ($message === '') {
                    $message = "Failed asserting that '{$this->actual}' does not contain \"{$needle}\".";
                }

                PHPUnit::fail($message);

                return $this;
            }

            PHPUnit::assertNotContains($needle, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsStringIgnoringCase($needle, string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if ($needle === '') {
                if ($message === '') {
                    $message = "Failed asserting that '{$this->actual}' does not contain \"{$needle}\".";
                }

                PHPUnit::fail($message);

                return $this;
            }

            PHPUnit::assertNotContains($needle, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormat($format, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormatFile($formatFile, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    public function stringStartsNotWith($prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsNotWith($prefix, $this->actual, $message);

        return $this;
    }

    public function stringStartsWith($prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsWith($prefix, $this->actual, $message);

        return $this;
    }
}
