<?php

namespace Realodix\NextProject\Expect;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Expect;

class ExpectDirectory extends Expect
{
    use ExpectDataTrait;

    /**
     * @param string $directory
     */
    public function __construct(string $directory)
    {
        parent::__construct($directory);
    }

    /**
     * Expect that a directory does not exist.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToExist(string $message = ''): self
    {
        Assert::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExist(string $message = ''): self
    {
        Assert::assertDirectoryExists($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists and is not readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndNotToBeReadable(string $message = ''): self
    {
        Assert::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists and is not writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndNotToBeWritable(string $message = ''): self
    {
        Assert::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists and is readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndToBeReadable(string $message = ''): self
    {
        Assert::assertDirectoryIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists and is writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndToBeWritable(string $message = ''): self
    {
        Assert::assertDirectoryIsWritable($this->actual, $message);

        return $this;
    }
}
