<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class ComparisonTest extends TestCase
{
    protected function setUp(): void
    {
        $this->assetsDir = __DIR__.DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR;
    }

    public function testEquals(): void
    {
        ass(5)->equals(5);
        ass('hello')->equals('hello');
        ass(5)->equals(5, 'user have 5 posts');

        ass(3)->notEquals(5);
    }

    public function testEqualsCanonicalizing(): void
    {
        ass([3, 2, 1])->equalsCanonicalizing([1, 2, 3]);

        ass([3, 2, 1])->notEqualsCanonicalizing([2, 3, 0, 1]);
    }

    public function testEqualsIgnoringCase(): void
    {
        ass('foo')->equalsIgnoringCase('FOO');
        ass('foo')->notEqualsIgnoringCase('BAR');
    }

    public function testEqualsWithDelta(): void
    {
        ass(1.01)->equalsWithDelta(1.0, 0.1);
        ass(3.251)->equalsWithDelta(3.25, 0.01);
        ass(3.251)->equalsWithDelta(3.25, 0.01, 'respects delta');

        ass(1.2)->notEqualsWithDelta(1.0, 0.1);
        ass(3.252)->notEqualsWithDelta(3.25, 0.001);
        ass(3.252)->notEqualsWithDelta(3.25, 0.001, 'respects delta');
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
        $actual = $this->assetsDir.'string_equals_file.txt';
        $expected = $this->assetsDir.'string_not_equals_file.txt';

        ass($actual)->fileEqualsCanonicalizing($actual);
        ass($actual)->fileNotEqualsCanonicalizing($expected);
    }

    public function testFileEqualsIgnoringCase()
    {
        $file1 = $this->assetsDir.'string_equals_file.txt';
        $file2 = $this->assetsDir.'string_equals_file_ci.txt';
        $file3 = $this->assetsDir.'string_not_equals_file_ci.txt';

        ass($file1)->fileEqualsIgnoringCase($file2);
        ass($file3)->fileNotEqualsIgnoringCase($file1);
    }

    public function testGreaterThan(): void
    {
        ass(7)->greaterThan(5);

        ass(7)->greaterThanOrEqual(7);
        ass(7)->greaterThanOrEqual(5);
    }

    public function testLessThan(): void
    {
        ass(7)->lessThan(10);
        ass(7)->lessThanOrEqual(7);
        ass(7)->lessThanOrEqual(8);
    }

    public function testSame(): void
    {
        ass(1)->same(0 + 1);
        ass(1)->notSame(true);
    }

    public function testStringEqualsFile(): void
    {
        ass('testing 123')->stringEqualsFile($this->assetsDir.'string_equals_file.txt');
        ass('Another string')->stringNotEqualsFile($this->assetsDir.'string_equals_file.txt');
    }

    public function testStringEqualsFileCanonicalizing(): void
    {
        ass('testing 123')
            ->stringEqualsFileCanonicalizing($this->assetsDir.'string_equals_file.txt');
        ass('notSame')
            ->stringNotEqualsFileCanonicalizing($this->assetsDir.'string_equals_file.txt');
    }

    public function testStringEqualsFileIgnoringCase(): void
    {
        ass('TESTING 123')
            ->stringEqualsFileIgnoringCase($this->assetsDir.'string_equals_file.txt');
        ass('Test 123')
            ->stringNotEqualsFileIgnoringCase($this->assetsDir.'string_equals_file.txt');
    }
}
