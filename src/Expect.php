<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version as PHPUnitVersion;

final class Expect
{
    /**
     * @var TestCase
     */
    private $exception;

    /**
     * @param TestCase $exception
     */
    private function __construct(TestCase $exception)
    {
        $this->exception = $exception;
    }

    public static function after(TestCase $exception)
    {
        return new self($exception);
    }

    public function exception(string $class = \Exception::class): self
    {
        $this->exception->expectException($class);

        return $this;
    }

    public function eCode(int $code): self
    {
        $this->exception->expectExceptionCode($code);

        return $this;
    }

    public function eMessage(string $message): self
    {
        $this->exception->expectExceptionMessage($message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 to improve the name of the expectExceptionMessageRegExp()
     * method. The expectExceptionMessageRegExp() method was soft deprecated in PHPUnit 8.4.0,
     * hard deprecated (warning) in PHPUnit 8.5.3 and removed in PHPUnit 9.0.0.
     *
     * @param string $regex
     */
    public function emMatches(string $regex): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectExceptionMessageMatches($regex);

        return $this;
    }

    public function deprecation(): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectException('\PHPUnit\Framework\Error\Deprecated');

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectDeprecation();

        return $this;
    }

    public function dMessage(string $message): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectExceptionMessage($message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectDeprecationMessage($message);

        return $this;
    }

    public function dmMatches(string $regex): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectDeprecationMessageMatches($regex);

        return $this;
    }

    public function notice(): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectException('\PHPUnit\Framework\Error\Notice');

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectNotice();

        return $this;
    }

    public function nMessage(string $message): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectExceptionMessage($message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectNoticeMessage($message);

        return $this;
    }

    public function nmMatches(string $regex): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectNoticeMessageMatches($regex);

        return $this;
    }

    public function warning(): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectException('\PHPUnit\Framework\Error\Warning');

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectWarning();

        return $this;
    }

    public function wMessage(string $message): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectExceptionMessage($message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectWarningMessage($message);

        return $this;
    }

    public function wmMatches(string $regex): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectWarningMessageMatches($regex);

        return $this;
    }

    public function error(): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectException('\PHPUnit\Framework\Error\Error');

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectError();

        return $this;
    }

    public function erMessage(string $message): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectExceptionMessage($message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectErrorMessage($message);

        return $this;
    }

    public function ermMatches(string $regex): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            // @codeCoverageIgnoreStart
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        $this->exception->expectErrorMessageMatches($regex);

        return $this;
    }
}
