<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert;
use PHPUnit\Runner\Version;
use Realodix\NextProject\Support\Constraint\ObjectEquals;
use Realodix\NextProject\Support\Validator;

trait PolyfillTrait
{
    public function containsEquals($needle, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.1', '<')) {
            Assert::assertContains($needle, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function notContainsEquals($needle, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.1', '<')) {
            Assert::assertNotContains($needle, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function fileEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertFileEquals($expected, $this->actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertFileNotEquals($expected, $this->actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertFileEquals($expected, $this->actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertFileNotEquals($expected, $this->actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertStringEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertStringNotEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertStringEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertStringNotEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function directoryDoesNotExist(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertDirectoryNotExists($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    public function directoryIsNotReadable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertDirectoryNotIsReadable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    public function directoryIsNotWritable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertDirectoryNotIsWritable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    public function fileDoesNotExist(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertFileNotExists($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileDoesNotExist($this->actual, $message);

        return $this;
    }

    public function fileIsNotReadable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertFileNotIsReadable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileIsNotReadable($this->actual, $message);

        return $this;
    }

    public function fileIsNotWritable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertFileNotIsWritable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileIsNotWritable($this->actual, $message);

        return $this;
    }

    public function isNotReadable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertNotIsReadable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertIsNotReadable($this->actual, $message);

        return $this;
    }

    public function isNotWritable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertNotIsWritable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertIsNotWritable($this->actual, $message);

        return $this;
    }

    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertRegExp($pattern, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertNotRegExp($pattern, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    public function isClosedResource(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.3', '<')) {
            if ($message === '') {
                $message = sprintf(
                    'Failed asserting that %s is of type "resource (closed)"',
                    var_export($this->actual, true)
                );
            }

            Assert::assertTrue(
                Validator::isClosedResource($this->actual),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    public function isNotClosedResource(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.3', '<')) {
            if ($message === '') {
                $message = sprintf(
                    'Failed asserting that %s is not of type "resource (closed)"',
                    var_export($this->actual, true)
                );
            }

            Assert::assertFalse(
                Validator::isClosedResource($this->actual),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    public function objectEquals($expected, string $method = 'equals', string $message = '')
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.4', '<')) {
            // Object type declarations were introduced in PHP 7.2, so it has to be
            // validated manually
            if (! \is_object($expected)) {
                throw new \TypeError(
                    sprintf(
                        'Argument 1 passed to assertObjectEquals() must be an object, %s given',
                        get_debug_type($expected)
                    )
                );
            }

            $constraint = new ObjectEquals($expected, $method);
            Assert::assertThat($this->actual, $constraint, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertObjectEquals($expected, $this->actual, $method, $message);

        return $this;
    }
}
