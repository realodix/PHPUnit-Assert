<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;

// Coba dibuat, ditemukan pada test Dir
// $this->expectException(AssertionFailedError::class);

final class FileDirectoryTest extends TestCase
{
    protected function setUp(): void
    {
        $this->assetsDir = __DIR__.DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR;
    }

    public function testDirectoryExists(): void
    {
        ass(__DIR__)->dirExists();
    }

    public function testDirectoryIsNotReadable(): void
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('unreadable_dir_', true);
        mkdir($dirName, octdec('0'));

        ass($dirName)->dirNotReadable();

        rmdir($dirName);
    }

    public function testDirectoryIsNotWritable(): void
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('not_writable_dir_', true);
        mkdir($dirName, octdec('444'));

        ass($dirName)->dirNotWritable();

        rmdir($dirName);
    }

    public function testDirectoryIsReadable(): void
    {
        ass(__DIR__)->dirReadable();
        $this->expectException(AssertionFailedError::class);
        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')->dirReadable();
    }

    public function testDirectoryIsWritable(): void
    {
        ass(__DIR__)->dirWritable();
    }

    public function testDirectoryNotExists(): void
    {
        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')->dirNotExist();
    }

    public function testFileEquals(): void
    {
        ass(__FILE__)->fileEquals(__FILE__);
        ass(__FILE__)->fileNotEquals(
            __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'composer.json'
        );
    }

    public function testFileEqualsCanonicalizing()
    {
        $file = $this->assetsDir.'string_equals_file.txt';

        ass($file)->fileEqualsCanonicalizing($file);
    }

    public function testFileEqualsIgnoringCase()
    {
        $expected = $this->assetsDir.'string_equals_file.txt';
        $input = $this->assetsDir.'string_equals_file_ci.txt';

        ass($expected)->fileEqualsIgnoringCase($input);
    }

    public function testFileExists(): void
    {
        ass(__FILE__)->fileExists();
        ass('completelyrandomfilename.txt')->fileDoesNotExist();
    }

    public function testFileIsNotReadable()
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $tempFile = tempnam(
            sys_get_temp_dir(),
            'unreadable'
        );

        chmod($tempFile, octdec('0'));

        ass($tempFile)->fileIsNotReadable();

        unlink($tempFile);
    }

    public function testFileIsNotWritable()
    {
        $tempFile = \tempnam(\sys_get_temp_dir(), 'not_writable');
        \chmod($tempFile, \octdec('0'));

        ass($tempFile)->fileIsNotWritable($tempFile);

        \chmod($tempFile, \octdec('755'));
        \unlink($tempFile);
    }

    public function testFileIsReadable()
    {
        $file = $this->assetsDir.'string_equals_file.txt';
        ass($file)->fileIsReadable();
    }

    public function testFileIsWritable()
    {
        $file = $this->assetsDir.'string_equals_file.txt';
        ass($file)->fileIsWritable();
    }

    public function testFileNotEqualsCanonicalizing()
    {
        $expected = $this->assetsDir.'string_equals_file.txt';
        $input = $this->assetsDir.'string_not_equals_file.txt';

        ass($input)->fileNotEqualsCanonicalizing($expected);
    }

    public function testFileNotEqualsIgnoringCase()
    {
        $expected = $this->assetsDir.'string_equals_file.txt';
        $input = $this->assetsDir.'string_not_equals_file_ci.txt';

        ass($input)->fileNotEqualsIgnoringCase($expected);
    }

    public function testIsReadable(): void
    {
        ass($this->assetsDir.'string_equals_file.txt')->isReadable();

        $path = __DIR__.\DIRECTORY_SEPARATOR.'NotExisting.php';
        ass($path)->isNotReadable();
    }

    public function testIsWritable(): void
    {
        $path = $this->assetsDir.'string_equals_file.txt';
        ass($path)->isWritable();

        $path = __DIR__.\DIRECTORY_SEPARATOR.'NotExisting'.\DIRECTORY_SEPARATOR;
        ass($path)->isNotWritable();
    }
}
