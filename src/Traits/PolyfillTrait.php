<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;
use Realodix\NextProject\Exceptions\InvalidComparisonMethodException;
use Realodix\NextProject\Support\Validator;
use ReflectionClass;
use ReflectionException;
use ReflectionNamedType;
use ReflectionObject;
use ReflectionType;
use TypeError;

trait PolyfillTrait
{
    /**
     * Asserts that a directory does not exist.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertDirectoryNotExists().
     * The original methods these new methods replace were hard deprecated in PHPUnit
     * 9.1.0 and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function directoryDoesNotExist(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotExists($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a directory exists and is not readable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertDirectoryNotIsReadable().
     * The original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function directoryIsNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a directory exists and is not writable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertDirectoryNotIsWritable()
     * The original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function directoryIsNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file does not exist.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertFileNotExists(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function fileDoesNotExist(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotExists($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file exists and is not readable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertFileNotIsReadable().
     * The original methods these new methods replace were hard deprecated in PHPUnit
     * 9.1.0 and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function fileIsNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file exists and is not writable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertFileNotIsWritable().
     * The original methods these new methods replace were hard deprecated in PHPUnit
     * 9.1.0 and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function fileIsNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type resource and is closed.
     *
     * These methods were introduced in PHPUnit 9.3.0.
     *
     * @param string $message
     *
     * @return self
     */
    public function isClosedResource(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.3', '<')) {
            // @codeCoverageIgnoreStart
            if ($message === '') {
                $message = \sprintf(
                    'Failed asserting that %s is of type "resource (closed)"',
                    \var_export($this->actual, true)
                );
            }

            PHPUnit::assertTrue(Validator::isClosedResource($this->actual), $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type resource or is an open resource.
     *
     * These methods were introduced in PHPUnit 9.3.0.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotClosedResource(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.3', '<')) {
            // @codeCoverageIgnoreStart
            if ($message === '') {
                $message = \sprintf(
                    'Failed asserting that %s is not of type "resource (closed)"',
                    \var_export($this->actual, true)
                );
            }

            PHPUnit::assertFalse(Validator::isClosedResource($this->actual), $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file/dir exists and is not readable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertNotIsReadable(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function isNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file/dir exists and is not writable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertNotIsWritable(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function isNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertRegExp(). The original
     * methods these new methods replace were hard deprecated in PHPUnit 9.1.0 and (will
     * be) removed in PHPUnit 10.0.0.
     *
     * @param string $pattern
     * @param string $message
     */
    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertNotRegExp(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $pattern
     * @param string $message
     */
    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that two objects are considered equal based on a custom object comparison
     * using a comparator method in the target object.
     *
     * The custom comparator method is expected to have the following method signature:
     * `equals(self $other): bool` (or similar with a different method name).
     *
     * Basically, the assertion checks the following:
     * - A method with name $method must exist on the $actual object.
     * - The method must accept exactly one argument and this argument must be required.
     * - This parameter must have a classname-based declared type.
     * - The $expected object must be compatible with this declared type.
     * - The method must have a declared bool return type. (JRF: not verified in this
     *   implementation)
     * - `$actual->$method($expected)` returns boolean true.
     *
     * @param object $expected Expected value.
     * @param string $method   The name of the comparator method within the object.
     * @param string $message  Optional failure message to display.
     * @param object $actual   The value to test.
     *
     * @throws TypeError                        When any of the passed arguments do not
     *                                          meet the required type.
     * @throws InvalidComparisonMethodException When the comparator method does not comply
     *                                          with the requirements.
     *
     * @return void
     */
    public function objectEquals($expected, $method = 'equals', $message = '')
    {
        $actual = $this->actual;

        /*
         * Parameter input validation.
         * In PHPUnit this is done via PHP native type declarations. Emulating this for the polyfill.
         */
        if (\is_object($expected) === false) {
            throw new TypeError(
                \sprintf(
                    'Argument 1 passed to assertObjectEquals() must be an object, %s given',
                    \gettype($expected)
                )
            );
        }

        if (\is_object($actual) === false) {
            throw new TypeError(
                \sprintf(
                    'Argument 2 passed to assertObjectEquals() must be an object, %s given',
                    \gettype($actual)
                )
            );
        }

        if (\is_scalar($method) === false) {
            throw new TypeError(
                \sprintf(
                    'Argument 3 passed to assertObjectEquals() must be of the type string, %s given',
                    \gettype($method)
                )
            );
        }

        $method = (string) $method;

        /*
         * Comparator method validation.
         */
        $reflObject = new ReflectionObject($actual);

        if ($reflObject->hasMethod($method) === false) {
            throw new InvalidComparisonMethodException(
                \sprintf(
                    'Comparison method %s::%s() does not exist.',
                    \get_class($actual),
                    $method
                )
            );
        }

        $reflMethod = $reflObject->getMethod($method);

        /*
         * As the next step, PHPUnit natively would validate the return type,
         * but as return type declarations is a PHP 7.0+ feature, the polyfill
         * skips this check in favour of checking the type of the actual
         * returned value.
         *
         * Also see the upstream discussion about this:
         * {@link https://github.com/sebastianbergmann/phpunit/issues/4707}
         */

        /*
         * Comparator method parameter requirements validation.
         */
        if ($reflMethod->getNumberOfParameters() !== 1
            || $reflMethod->getNumberOfRequiredParameters() !== 1
        ) {
            throw new InvalidComparisonMethodException(
                \sprintf(
                    'Comparison method %s::%s() does not declare exactly one parameter.',
                    \get_class($actual),
                    $method
                )
            );
        }

        $noDeclaredTypeError = \sprintf(
            'Parameter of comparison method %s::%s() does not have a declared type.',
            \get_class($actual),
            $method
        );

        $notAcceptableTypeError = \sprintf(
            '%s is not an accepted argument type for comparison method %s::%s().',
            \get_class($expected),
            \get_class($actual),
            $method
        );

        $reflParameter = $reflMethod->getParameters()[0];

        if (\method_exists($reflParameter, 'hasType')) {
            // PHP >= 7.0.
            $hasType = $reflParameter->hasType();
            if ($hasType === false) {
                throw new InvalidComparisonMethodException($noDeclaredTypeError);
            }

            $type = $reflParameter->getType();
            if (\class_exists('ReflectionNamedType')) {
                // PHP >= 7.1.
                if (($type instanceof ReflectionNamedType) === false) {
                    throw new InvalidComparisonMethodException($noDeclaredTypeError);
                }

                $typeName = $type->getName();
            } else {
                /*
                 * PHP 7.0.
                 * Checking for `ReflectionType` will not throw an error on union types,
                 * but then again union types are not supported on PHP 7.0.
                 */
                if (($type instanceof ReflectionType) === false) {
                    throw new InvalidComparisonMethodException($noDeclaredTypeError);
                }

                $typeName = (string) $type;
            }
        } else {
            // PHP < 7.0.
            try {
                /*
                 * Using `ReflectionParameter::getClass()` will trigger an autoload of the class,
                 * but that's okay as for a valid class type that would be triggered on the
                 * function call to the $method (at the end of this assertion) anyway.
                 */
                $hasType = $reflParameter->getClass();
            } catch (ReflectionException $e) {
                // Class with a type declaration for a non-existent class.
                throw new InvalidComparisonMethodException($notAcceptableTypeError);
            }

            if (($hasType instanceof ReflectionClass) === false) {
                // Array or callable type.
                throw new InvalidComparisonMethodException($noDeclaredTypeError);
            }

            $typeName = $hasType->name;
        }

        /*
         * Validate that the $expected object complies with the declared parameter type.
         */
        if ($typeName === 'self') {
            $typeName = \get_class($actual);
        }

        if (($expected instanceof $typeName) === false) {
            throw new InvalidComparisonMethodException($notAcceptableTypeError);
        }

        /*
         * Execute the comparator method.
         */
        $result = $actual->{$method}($expected);

        if (\is_bool($result) === false) {
            throw new InvalidComparisonMethodException(
                \sprintf(
                    'Comparison method %s::%s() does not return a boolean value.',
                    \get_class($actual),
                    $method
                )
            );
        }

        $msg = \sprintf(
            'Failed asserting that two objects are equal. The objects are not equal according to %s::%s()',
            \get_class($actual),
            $method
        );

        if ($message !== '') {
            $msg = $message.\PHP_EOL.$msg;
        }

        PHPUnit::assertTrue($result, $msg);
    }
}